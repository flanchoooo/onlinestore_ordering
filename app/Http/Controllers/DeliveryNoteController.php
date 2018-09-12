<?php

namespace App\Http\Controllers;

use App\DeliveryNote;
use App\Order;
use App\Payment;
use App\Quotation;
use App\QuotationItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class DeliveryNoteController extends Controller
{
    public function index(){
        $delivery_notes = DB::table('delivery_notes')
            ->where('delivery_notes.user_id', '=', Auth::user()->id)
            ->join('orders', 'orders.id', '=', 'delivery_notes.order_id')
            ->join('administrators', 'administrators.id', '=', 'delivery_notes.admin_id')
            ->select('delivery_notes.id','delivery_notes.payment_id','administrators.name as name','delivery_notes.created_at','delivery_notes.updated_at','delivery_notes.status','delivery_notes.billing_address')
            ->paginate(10);
        return view('delivery-notes.delivery-notes',compact('delivery_notes',$delivery_notes));
    }
    public function viewDeliveryNote($id){
        $delivery_note = DB::table('delivery_notes')
            ->where('delivery_notes.id', '=', $id)
            ->join('orders', 'orders.id', '=', 'delivery_notes.order_id')
            ->join('users', 'users.id', '=', 'delivery_notes.user_id')
            ->first(['delivery_notes.id','users.name as user_name','users.email as user_email','users.mobile as user_mobile', 'orders.id as order_id', 'orders.enquiry_id as enquiry_id', 'orders.quotation_id as quotation_id', 'delivery_notes.created_at', 'delivery_notes.updated_at', 'delivery_notes.status','delivery_notes.billing_address','delivery_notes.payment_id']);

        if (sizeof($delivery_note) == 0) {
            abort(404);
        };

        return view('delivery-notes.delivery-note', compact('delivery_note', $delivery_note));
    }

    public function generateSentDeliveryNote(Request $request){
        $quotation_items = QuotationItem::whereQuotationId($request->quotation)
            ->get();

        $quotation = Quotation::find($request->quotation);
        $delivery_note = DeliveryNote::find($request->id);
        $order = Order::find($request->order);
        $customer = User::find($quotation_items[0]['user_id']);
        $payment = Payment::find($request->payment);

        $data = array(
            'items'           => $quotation_items,
            'user'            => $quotation_items[0]['user_id'],
            'customer'        => $customer,
            'delivery_note'   => $delivery_note->id,
            'date'            => Carbon::parse($delivery_note->delivery_date)->format('d M Y'),
            'billing_address' => $payment->billing_address);


        $pdf = PDF::loadView('delivery-notes.template', $data);

        return $pdf->download('delivery-note.pdf');

    }
    public function updateDelivery(Request $request){
        $delivery_note = DeliveryNote::find($request->id);
        $delivery_note->status = 'Goods Received';
        $delivery_note->save();
        $order = Order::find($delivery_note->order_id);
        $order->status = 'Goods Received';
        $order->save();
        //return 'Confirmation Sent!(Please refresh your page.)';
        return redirect()->back();

    }


}
