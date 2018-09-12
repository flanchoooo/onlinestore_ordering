<?php

namespace App\Http\Controllers;

use App\ShoppingOrder;
use App\ShoppingOrderDetails;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalController extends Controller
{

    protected $provider;
    protected $latest_order;

    public function __construct(){
        try {

            $this->provider = new ExpressCheckout();


        } catch (\Exception $e) {
            return $e;
        }
    }


    public function expressCheckout(Request $request){


        $data = $this->cartData();
        $cart_items = Cart::content()->toArray();


        try {
            $shopping_order = ShoppingOrder::create([
                'name'             => $request->name,
                'email_address'    => $request->email,
                'cell_number'      => $request->cell_number,
                'delivery_town'    => $request->city,
                'delivery_address' => $request->address,
                'status'           => 'Pending',
                'total'            => $data['total'],
                'payment_type'     => 'PayPal',
                'payment_status'   => 'Pending',

            ]);
            /*$shopping_order = ShoppingOrder::create([
                'name'             => 'ssdf',
                'email_address'    => 'deant@test.com',
                'cell_number'      => '263772240291',
                'delivery_town'    => 'Harare',
                'delivery_address' => 'sdfsdfsdf',
                'status'           => 'Pending',
                'total'            => $data['total'],
                'payment_type'     => 'PayPal',
                'payment_status'   => 'Pending',

            ]);*/
            foreach ($cart_items as $item) {
                ShoppingOrderDetails::create([
                    'shopping_order_id' => $shopping_order->id,
                    'shopping_item_id'  => $item['id'],
                    'quantity'          => $item['qty'],
                ]);
            }

            $this->latest_order = $shopping_order->id;
            $delivery_fee = 0;
            if ($request->city == 'Harare') {
                $delivery_fee = 5;
            } elseif ($request->city == 'Bulawayo') {
                $delivery_fee = 15;
            } elseif ($request->city == 'Gweru') {
                $delivery_fee = 10;
            } elseif ($request->city == 'Kadoma') {
                $delivery_fee = 7;
            } elseif ($request->city == 'Kwekwe') {
                $delivery_fee = 8;
            } elseif ($request->city == 'Chegutu') {
                $delivery_fee = 6;
            }

            $data = $this->cartData();
            $delivery = [
                'name'  => 'Delivery Fee',
                'qty'   => 1,
                'price' => $delivery_fee,
            ];
            array_push($data['items'], $delivery);
            $data['total'] += $delivery_fee;

            //return $data;
            $response = $this->provider->setExpressCheckout($data);

            //return $response;
            return redirect($response['paypal_link']);

        } catch (\Exception $e) {
            return $e;
        }


    }

    public function expressCheckoutSuccess(Request $request){

        // check if payment is recurring

        $token = $request->get('token');

        $PayerID = $request->get('PayerID');


        $response = $this->provider->getExpressCheckoutDetails($token);


        // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
        // we return back with error
        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect('/my-cart')->with(['info' => 'Error processing PayPal payment']);
        }

        // invoice id is stored in INVNUM
        // because we set our invoice to be xxxx_id
        // we need to explode the string and get the second element of array
        // witch will be the id of the invoice
        $invoice_id = $response['INVNUM'];

        $shopping_order = ShoppingOrder::find($invoice_id);


        // if payment is not recurring just perform transaction on PayPal
        // and get the payment status
        $data = $this->cartData();
        try {
            $payment_status = $this->provider->doExpressCheckoutPayment($data, $token, $PayerID);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            $shopping_order->status = $status;
            $shopping_order->save();
            Cart::destroy();

            return redirect('/')->with('info', 'Your payment is being processed.Thank you.');


        } catch (\Exception $e) {
            return $e;
        }


    }

    private function cartData(){

        $total = 0;
        $cart_items = Cart::content()->toArray();
        $items = [];
        foreach ($cart_items as $item) {
            $each_item = [
                'name'  => $item['name'],
                'price' => $item['price'],
                'qty'   => $item['qty'],
            ];

            array_push($items, $each_item);

            $total += $item['subtotal'];
        }
        $data = [];

        $data['items'] = $items;
        $data['invoice_id'] = $this->latest_order;
        $data['invoice_description'] = "Order #{$data['invoice_id']} - Evolution Pharmacy";
        $data['return_url'] = url('/paypal/payment/success');
        $data['cancel_url'] = url('/my-cart');
        $data['total'] = $total;

        return $data;

    }


}
