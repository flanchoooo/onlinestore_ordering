<?php

namespace App\Services;


use App\Payment;
use App\Paynow;
use App\Transaction;
use Carbon\Carbon;
use Exception;
use GuzzleHttp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public function makePayment($account_id, $amount, $description, $paynow_status, $transaction_id){


        DB::beginTransaction();


        try {
            Transaction::create([
                'amount'         => $amount,
                'loan_account'   => $account_id,
                'account_number' => $description,
                'paynow_status'  => $paynow_status,
            ]);

            $paynow = Paynow::find($transaction_id);
            $paynow->delete();



            DB::commit();

            return true;

        } catch (Exception $e) {

            Log::info($e->getMessage());
            Log::info($e->getLine());

            DB::rollback();

            return false;
        }

    }




}