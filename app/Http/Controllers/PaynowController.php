<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Jobs\CheckPaynowStatus;
use App\Order;
use App\Payment;
use App\Paynow;
use App\Quotation;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaynowController extends Controller
{
    public function initiate(Request $request){
        $validator = $this->paynowRules($request->all());

        if ($validator->fails()) {
            return response()->json(['code' => '99', 'description' => $validator->errors()]);
        }

        $reference = $request->reference;
        $amount = $request->amount;
        $additionalInfo = "Payment for order no. $request->reference";
        $id = env('PAYNOW_INTEGRATION_ID');
        $key = env('PAYNOW_INTEGRATION_KEY');

        $client = new GuzzleHttp\Client(['verify' => false]);

        $integrationId = $id;

        $returnUrl = env('PAYNOW_RETURN_URL') . $reference;
        $resultUrl = env('PAYNOW_RESULT_URL') . $reference;


        $status = 'Message';

        $integrationKey = $key;

        $hashValues = [$integrationId, $reference, $amount, $additionalInfo, $returnUrl, $resultUrl, $status];

        $params = array(
            'id'             => $integrationId,
            'reference'      => $reference,
            'amount'         => $amount,
            'additionalinfo' => $additionalInfo,
            'returnurl'      => $returnUrl,
            'resulturl'      => $resultUrl,
            'status'         => $status,
            'Hash'           => $this->createHash($hashValues, $integrationKey),
        );
        //return $params;

        $res = $client->request('POST', 'https://www.paynow.co.zw/interface/initiatetransaction', array('form_params' => $params));

        Log::debug($res->getBody());

        $responseParams = $parseResponse = explode("&", $res->getBody());

        if (strtolower($responseParams[0]) == 'status=ok') {
            $processURL = explode("=", $responseParams[1])[1];
            $checkURL = explode("=", $responseParams[2])[1];

            //Persist to db
            $paynow = Paynow::create([
                'amount'    => $amount,
                'status'    => 'Initiated',
                'order_id'  => $request->reference,
                'check_url' => urldecode($checkURL),
                'user_id'   => Auth::user()->id,
            ]);

            Payment::create([
                'user_id'         => Auth::user()->id,
                'status'          => 'Initiated',
                'method'          => 'Paynow',
                'billing_address' => $request->billing_address,
                'amount'          => $amount,
                'paynow_id'       => $paynow->id,
                'order_id'        => $request->reference,
            ]);

            return redirect(urldecode($processURL));

        } else {
            return "Error 0x0002 : Transaction initiation failed";
        }

    }

    public function paynowRules(array $data){
        $validator = Validator::make($data, [
            'reference' => 'required | exists:orders,id',
            'amount'    => 'required',
        ]);

        return $validator;
    }

    private function createHash($values, $IntegrationKey){
        $string = "";
        foreach ($values as $value) {
            $string .= $value;
        }
        $string .= $IntegrationKey;
        $hash = hash("sha512", utf8_encode($string));

        return strtoupper($hash);

    }

    public function returnUrl($id, Request $request){

        Log::debug('Return url paynow :', [$request->id, json_encode($request)]);
        Log::debug('Selected account ' . Paynow::whereOrderId((int)$request->id)->first());


        $this->dispatch(new CheckPaynowStatus(Paynow::whereOrderId((int)$request->id)->first()));

        $order = Order::find($request->id);
        $order->status = 'Payment Being Processed';
        $order->save();

        $enquiry = Enquiry::find($order->enquiry_id);
        $enquiry->status = 'Payment Being Processed';
        $enquiry->save();

        $quotation = Quotation::find($order->quotation_id);
        $quotation->status = 'Payment Being Processed';
        $quotation->save();

        return redirect('/payments')->with('info', 'Your payment is being processed.Thank you.');
    }
}
