<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Invoice;
use App\QuotationItem;
use App\User;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::with('order')
            ->whereUserId(Auth::user()->id)
            ->paginate(10);

        foreach ($invoices as $invoice){
            $invoice['enquiry'] = Enquiry::find($invoice['order']->enquiry_id);
        }
        //return $invoices;
        return view('invoices.invoices', compact('invoices', $invoices));
    }

    public function getInvoices(Request $request){
        $invoices = Invoice::with('order')
            ->whereUserId(Auth::user()->id)
            ->get();

        foreach ($invoices as $invoice){
            $invoice['enquiry'] = Enquiry::find($invoice['order']->enquiry_id);
        }
        return $invoices;
    }

    public function viewInvoice($id){
        $invoice = DB::table('invoices')
            ->where('invoices.id', '=', $id)
            ->where('invoices.user_id', '=', Auth::user()->id)
            ->join('orders', 'orders.id', '=', 'invoices.order_id')
            ->join('enquiries', 'enquiries.id', '=', 'orders.enquiry_id')
            ->first(['invoices.id', 'orders.id as order_id', 'orders.enquiry_id as enquiry_id','enquiries.payment_method', 'orders.quotation_id as quotation_id', 'invoices.created_at', 'invoices.updated_at', 'invoices.status']);

        $quotation_items = QuotationItem::whereQuotationId($invoice->quotation_id)
            ->get();
        $total = 0;

        foreach ($quotation_items as $quotation_item) {
            $total += ($quotation_item['qty'] * $quotation_item['price']) - $quotation_item['deducted'] ;
        }
        $invoice->total = $total;
        if (sizeof($invoice) == 0) {
            abort(404);
        };

        return view('invoices.invoice', compact('invoice', $invoice));
    }

    public function generateInvoice(Request $request){
        $quotation_items = QuotationItem::whereQuotationId($request->quotation)
            ->get();
        $customer = User::find($quotation_items[0]['user_id']);
        $total = 0;

        foreach ($quotation_items as $quotation_item) {
            $total += ($quotation_item['qty'] * $quotation_item['price']) - $quotation_item['deducted'] ;
        }
        $data = array('total'    => $total,
                      'items'    => $quotation_items,
                      'user'     => $quotation_items[0]['user_id'],
                      'customer' => $customer,
                      'invoice'  => $request->invoice);

        //return $data;

        $pdf = PDF::loadView('invoices.template', $data);

        return $pdf->download('invoice.pdf');
    }
}
