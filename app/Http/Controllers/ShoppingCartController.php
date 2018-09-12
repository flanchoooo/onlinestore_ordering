<?php

namespace App\Http\Controllers;

use App\Jobs\CheckPaynowStatus;
use App\Jobs\CheckShoppingPaynowStatus;
use App\Ordering\Helper;
use App\ShoppingItem;
use App\ShoppingOrder;
use App\ShoppingOrderDetails;
use App\ShoppingPaynow;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ShoppingCartController extends Controller
{

    public function cartIndex(){

        $cart_items_total = Cart::content()->toArray();
        $cart_items = Cart::content();

        $total = 0;

        foreach ($cart_items_total as $item) {
            $total += $item['subtotal'];
        }
        $data = ['total' => $total, 'cart_items' => $cart_items];

        return view('cart.cart')->with($data);

    }

    public function checkoutIndex(){
        $cart_items = Cart::content();

        //return $cart_items;
        if (count($cart_items) == 0) {
            return redirect()->back()->with(['error' => 'Your Cart is Empty!']);
        };

        $cart_items_total = Cart::content()->toArray();
        $cart_items = Cart::content();

        $total = 0;

        foreach ($cart_items_total as $item) {
            $total += $item['subtotal'];
        }
        $data = ['total' => $total, 'cart_items' => $cart_items];

        return view('cart.checkout')->with($data);
        //return Cart::content();
    }

    public function addToCart(Request $request, $id){
        $this->addRules($request->all())->validate();

        $product = ShoppingItem::find($id);

        Cart::add($product->id, $product->name, $request->qty, $product->price);

        return redirect('/wild')->with(['status'=>'Item added to cart']);
    }

    public function viewItem(Request $request, $id){

        $shopping_item = ShoppingItem::find($id);

        return view('cart.item', compact('shopping_item', $shopping_item));

    }

    public function removeItem($id){
        Cart::remove($id);

        return redirect()->back();
    }

    public function updateItem(Request $request, $id){
        Cart::update($id, $request->qty);

        return redirect()->back();

    }

    private function addRules(array $data){
        return Validator::make($data, [
            'qty' => 'required|numeric|min:0',
        ]);


    }


    public function createOrder(Request $request,PayPalController $pay_pal_controller){

        if($request->payment_method =='paypal'){
            $pay_pal_controller->expressCheckout($request);
        }

        $total = 0;
        $cart_items = Cart::content()->toArray();
        foreach ($cart_items as $item) {

            $total += $item['subtotal'];
        }

        //return $request->all();

        if ($request->city == 'Harare') {
            $total += 5;
        } elseif ($request->city == 'Bulawayo') {
            $total += 15;
        } elseif ($request->city == 'Gweru') {
            $total += 10;
        } elseif ($request->city == 'Kadoma') {
            $total += 7;
        } elseif ($request->city == 'Kwekwe') {
            $total += 8;
        } elseif ($request->city == 'Chegutu') {
            $total += 6;
        }

        //return $total;
        DB::beginTransaction();


        try {


            $shopping_order = ShoppingOrder::create([
                'name'             => $request->name,
                'email_address'    => $request->email,
                'cell_number'      => $request->cell_number,
                'delivery_town'    => $request->city,
                'delivery_address' => $request->address,
                'status'           => 'Pending',
                'total'            => $total,
                'payment_type'     => 'Paynow',
                'payment_status'   => 'Pending',

            ]);

            foreach ($cart_items as $item) {
                ShoppingOrderDetails::create([
                    'shopping_order_id' => $shopping_order->id,
                    'shopping_item_id'  => $item['id'],
                    'quantity'          => $item['qty'],
                ]);
            }


            $reference = $shopping_order->id;
            $amount = $total;
            $additionalInfo = "Payment for order no. $shopping_order->id";
            $id = env('PAYNOW_INTEGRATION_ID');
            $key = env('PAYNOW_INTEGRATION_KEY');

            $client = new GuzzleHttp\Client(['verify' => false]);

            $integrationId = $id;

            $returnUrl = env('PAYNOW_RETURN_URL_SHOPPING') . $reference;
            $resultUrl = env('PAYNOW_RESULT_URL_SHOPPING') . $reference;


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
                $paynow = ShoppingPaynow::create([
                    'amount'            => $amount,
                    'status'            => 'Initiated',
                    'shopping_order_id' => $reference,
                    'check_url'         => urldecode($checkURL),
                ]);

                $shopping_order->paynow_id = $paynow->id;
                $shopping_order->save();
                DB::commit();



                return redirect(urldecode($processURL));

            } else {
                DB::rollback();

                return "Error 0x0002 : Transaction initiation failed";
            }
        } catch (\Exception $e) {

            //return $e;
            DB::rollback();

            Log::debug($e->getMessage());

            return redirect()->back()
                ->with(['status' => 'Payment Failed! Please Try Again Later']);
        }


    }

    public function returnUrl($id, Request $request){

        Log::debug('Return url paynow :', [$request->id, json_encode($request)]);
        Log::debug('Selected account ' . ShoppingPaynow::whereShoppingOrderId((int)$request->id)->first());


        $this->dispatch(new CheckShoppingPaynowStatus(ShoppingPaynow::whereShoppingOrderId((int)$request->id)->first()));

        Cart::destroy();

        //return 'Done';
        return redirect('/')->with('info', 'Your payment is being processed.Thank you.');
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

    public function checkPayments(){
        $paynows = ShoppingPaynow::where('status', 'not like', 'paid')
            ->get();

        foreach ($paynows as $paynow) {

            $client = new GuzzleHttp\Client(['verify' => false]);
            $res = $client->request('POST', $paynow->check_url);

            (new Helper)->shoppingPaymentStatus($res->getBody(), $paynow);
        }

        return 'Done!';
    }




}
