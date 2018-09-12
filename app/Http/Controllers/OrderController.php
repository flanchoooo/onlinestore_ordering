<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Order;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::whereUserId(Auth::user()->id)
            ->paginate(10);

        return view('orders.orders', compact('orders', $orders));
    }

    public function create(Request $request){
        DB::beginTransaction();
        try {
            Order::create([
                'user_id'           => Auth::user()->id,
                'quotation_id'      => $request->quotation_id,
                'enquiry_id'        => $request->enquiry_id,
                'invoicing_address' => $request->invoicing_address,
                'delivery_address'  => $request->delivery_address,
                'delivery_method'   => $request->delivery_method,
                'contact_person'    => $request->contact_person,
                'contact_number'    => $request->contact_number,
            ]);
            $enquiry = Enquiry::find($request->enquiry_id);
            $quotation = Quotation::find($request->quotation_id);

            $enquiry->status = 'Order Placed';
            $quotation->status = 'Order Placed';

            $enquiry->save();
            $quotation->save();
            DB::commit();


            return redirect()->back()->with(['status' => 'Order Placed Successfully']);
        } catch (\Exception $exception) {
            DB::rollback();

            Log::debug($exception->getMessage());

            return redirect()->back()
                ->with(['error' => 'Order could not be placed. Please try again!']);
        }


    }

    public function viewOrder($id){
        $order = Order::whereId($id)
            ->whereUserId(Auth::user()->id)
            ->first();
        $enquiry = Enquiry::find($order->enquiry_id);
        $quotation = Quotation::find($order->quotation_id);
        $data = array('order'     => $order,
                      'enquiry'   => $enquiry,
                      'quotation' => $quotation);


        if (sizeof($order) == 0) {
            abort(404);
        };

        return view('orders.order')->with($data);
    }


}
