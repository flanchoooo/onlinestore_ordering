<?php

namespace App\Http\Controllers;

use App\Ordering\Helper;
use App\Payment;
use App\Paynow;
use App\QuotationItem;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(){
        $payments = DB::table('payments')
            ->where('payments.user_id', '=', Auth::user()->id)
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->select(['payments.id', 'orders.id as order_id', 'orders.enquiry_id as enquiry_id', 'orders.quotation_id as quotation_id','payments.amount' ,'payments.created_at', 'payments.updated_at', 'payments.status'])
            ->paginate(10);

        return view('payments.payments', compact('payments', $payments));
    }

    public function acceptPayment(Request $request){

        Payment::create([
            'user_id'         => Auth::user()->id,
            'status'          => 'Accepted(Pending Payment)',
            'method'          => 'Cash',
            'billing_address' => $request->billing_address,
            'amount'          => $request->amount,
            'order_id'        => $request->reference,
        ]);
        return redirect('/payments')->with(['status','Payment Accepted Successfully!']);
    }
    public function acceptMedicalAidPayment(Request $request){
        Payment::create([
            'user_id'         => Auth::user()->id,
            'status'          => 'Accepted',
            'method'          => 'Medical Aid',
            'billing_address' => $request->billing_address,
            'amount'          => $request->amount,
            'order_id'        => $request->reference,
        ]);
        return redirect('/payments')->with(['status','Payment Accepted Successfully!']);

    }

    public function viewPayment($id){
        $payment = DB::table('payments')
            ->where('payments.id', '=', $id)
            ->where('payments.user_id', '=', Auth::user()->id)
            ->join('orders', 'orders.id', '=', 'payments.order_id')
            ->first(['payments.id', 'orders.id as order_id', 'orders.enquiry_id as enquiry_id', 'orders.quotation_id as quotation_id', 'payments.created_at', 'payments.updated_at', 'payments.status','payments.amount']);

        if (sizeof($payment) == 0) {
            abort(404);
        };

        return view('payments.payment', compact('payment', $payment));
    }

    public function checkPayments(){
        $paynows = Paynow::where('status', 'not like', 'paid')
            ->get();

        foreach ($paynows as $paynow) {

            $client = new GuzzleHttp\Client(['verify' => false]);
            $res = $client->request('POST', $paynow->check_url);

            (new Helper)->paymentStatus($res->getBody(), $paynow);
        }

        return 'Done!';
    }

}
