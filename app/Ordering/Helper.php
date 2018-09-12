<?php

namespace App\Ordering;


use App\Mail\PaymentAlert;
use App\Payment;
use App\Services\PaymentService;
use App\ShoppingOrder;
use App\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * @property PaymentService payment_service
 */
class Helper
{


    public  function paymentStatus($response, $paynow){

        $payment = Payment::where('paynow_id', '=', $paynow->id)
            ->first();
        if (strpos(strtolower($response), 'status=paid') !== false) {

            Log::debug('Account from status' . $paynow);
            $paynow->update(['status' => 'paid']);

            $payment = Payment::where('paynow_id', '=', $paynow->id)
                ->first();
            $payment->status = 'Paid';
            $payment->save();
            $this->sendPaymentAlert($payment);

        } elseif (strpos(strtolower($response), 'status=created+but+not+paid') !== false) {

            $paynow->update(['status' => 'Created but not paid']);
            $payment->status = 'Created but not paid';
            $payment->save();
            $this->sendPaymentAlert($payment);


        } elseif (strpos(strtolower($response), 'status=cancelled') !== false) {

            $paynow->update(['status' => 'Cancelled']);
            $payment->status = 'Cancelled';
            $payment->save();
            $this->sendPaymentAlert($payment);


        } elseif (strpos(strtolower($response), 'status=awaiting+redirect') !== false) {

            $paynow->update(['status' => 'Awaiting redirect']);
            $payment = Payment::where('paynow_id', '=', $paynow->id)->first();

            $payment->status = 'Failed';
            $payment->save();


        } elseif (strpos(strtolower($response), 'status=failed') !== false) {
            $paynow->update(['status' => 'Failed']);
            $payment->status = 'Failed';
            $payment->save();
            $this->sendPaymentAlert($payment);


        } elseif (strpos(strtolower($response), 'status=awaiting+delivery') !== false) {

            $paynow->update(['status' => 'Awaiting Delivery']);
            $payment->status = 'Awaiting Delivery';
            $payment->save();
            $this->sendPaymentAlert($payment);
        }
    }

    public function sendPaymentAlert(Payment $payment){
        if($payment->notified){
            return;
        }
        $user = User::find($payment->user_id);
        try {
            Mail::to($user->email)->queue(new PaymentAlert($user, $payment->order_id, $payment->status));

        } catch (Exception $exception) {

        }

        $payment->update(['notified' => true]);

    }

    public function shoppingPaymentStatus($response, $paynow){

        $payment = ShoppingOrder::where('paynow_id', '=', $paynow->id)
            ->first();
        if (strpos(strtolower($response), 'status=paid') !== false) {

            Log::debug('Account from status' . $paynow);
            $paynow->update(['status' => 'paid']);
            $payment->payment_status = 'Paid';
            $payment->save();

        } elseif (strpos(strtolower($response), 'status=created+but+not+paid') !== false) {

            $paynow->update(['status' => 'Created but not paid']);
            $payment->payment_status = 'Created but not paid';
            $payment->save();


        } elseif (strpos(strtolower($response), 'status=cancelled') !== false) {

            $paynow->update(['status' => 'Cancelled']);
            $payment->payment_status = 'Cancelled';
            $payment->save();


        } elseif (strpos(strtolower($response), 'status=awaiting+redirect') !== false) {

            $paynow->update(['status' => 'Awaiting redirect']);
            $payment->payment_status = 'Failed';
            $payment->save();


        } elseif (strpos(strtolower($response), 'status=failed') !== false) {
            $paynow->update(['status' => 'Failed']);
            $payment->payment_status = 'Failed';
            $payment->save();


        } elseif (strpos(strtolower($response), 'status=awaiting+delivery') !== false) {

            $paynow->update(['status' => 'Awaiting Delivery']);
            $payment->payment_status = 'Awaiting Delivery';
            $payment->save();
        }

    }

}