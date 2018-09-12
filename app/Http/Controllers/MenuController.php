<?php

namespace App\Http\Controllers;

use App\DeliveryNote;
use App\Enquiry;
use App\Invoice;
use App\Order;
use App\Payment;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function getMenuData(Request $request){
        $enquiries = Enquiry::whereUserId(Auth::user()->id)
            ->count();
        $orders = Order::whereUserId(Auth::user()->id)
            ->count();
        $payments = Payment::whereUserId(Auth::user()->id)
            ->count();
        $quotations = Quotation::whereUserId(Auth::user()->id)
            ->count();
        $invoices = Invoice::whereUserId(Auth::user()->id)
            ->count();
        $delivery_notes = DeliveryNote::whereUserId(Auth::user()->id)
            ->count();

        return array(
            'Enquiries'     => $enquiries,
            'Orders'        => $orders,
            'Payments'      => $payments,
            'Quotations'    => $quotations,
            'Invoices'      => $invoices,
            'DeliveryNotes' => $delivery_notes,
        );
    }

    public function getTemplate(){
        return view('quotations.template');
    }
}
