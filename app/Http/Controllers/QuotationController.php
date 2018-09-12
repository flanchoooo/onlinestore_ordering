<?php

namespace App\Http\Controllers;

use App\Quotation;
use App\QuotationItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class QuotationController extends Controller
{
    public function index(){
        $quotations = DB::table('quotations')
            ->where('quotations.user_id','=',Auth::user()->id)
            ->join('administrators', 'quotations.admin_id', '=', 'administrators.id')
            ->join('users', 'quotations.user_id', '=', 'users.id')
            ->select('quotations.id', 'quotations.enquiry_id', 'quotations.status', 'administrators.name as admin_name', 'users.name as user_name', 'quotations.created_at', 'quotations.updated_at')
            ->paginate(10);


        return view('quotations.quotations', compact('quotations', $quotations));
    }

    public function getQuotations(){
        return DB::table('quotations')
            ->where('quotations.user_id','=',Auth::user()->id)
            ->join('administrators', 'quotations.admin_id', '=', 'administrators.id')
            ->join('users', 'quotations.user_id', '=', 'users.id')
            ->select('quotations.id', 'quotations.enquiry_id', 'quotations.status', 'administrators.name as admin_name', 'users.name as user_name', 'quotations.created_at', 'quotations.updated_at')
            ->get();

    }

    public function viewQuotation($id){

        $quotation = DB::table('quotations')
            ->where('quotations.id', '=', $id)
            ->where('quotations.user_id','=',Auth::user()->id)
            ->join('administrators', 'quotations.admin_id', '=', 'administrators.id')
            ->join('users', 'quotations.user_id', '=', 'users.id')
            ->join('enquiries', 'quotations.enquiry_id', '=', 'enquiries.id')
            ->select('quotations.id', 'quotations.enquiry_id', 'quotations.status', 'administrators.name as admin_name', 'users.name as user_name', 'users.email as user_email', 'users.mobile as user_mobile', 'enquiries.name as enquiry_name', 'quotations.created_at', 'quotations.updated_at')
            ->first();

        if (sizeof($quotation) == 0) {
            abort(404);
        };
        $data = ['quotation' => $quotation];

        return view('quotations.quotation')->with($data);
    }

    public function generateQuotation(Request $request){
        $quotation_items = QuotationItem::whereQuotationId($request->id)
            ->get();
        $customer = User::find($quotation_items[0]['user_id']);
        $total = 0;

        foreach ($quotation_items as $quotation_item) {
            $total += ($quotation_item['qty'] * $quotation_item['price']) - $quotation_item['deducted'] ;
        }

        $data = array('total'     => $total,
                      'items'     => $quotation_items,
                      'user'      => $quotation_items[0]['user_id'],
                      'customer'  => $customer,
                      'quotation' => $request->id);

        //return $data;

        $pdf = PDF::loadView('quotations.template', $data);

        return $pdf->download('quotation.pdf');
    }




    public function saveDocument(Request $request){
        $quotation = Quotation::find($request->quotation);
        $quotation->addMediaFromRequest('file')->toMediaCollection('quotations');

    }
}
