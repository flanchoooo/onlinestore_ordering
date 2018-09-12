<?php

namespace App\Jobs;

use App\Ordering\Helper;
use App\Paynow;
use App\Services\PaymentService;
use App\ShoppingPaynow;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp;
use Illuminate\Support\Facades\Log;

class CheckShoppingPaynowStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 2;


    public $timeout = 300;


    private $paynow;

    /**
     * Create a new job instance.
     *
     * @param Paynow $paynow
     */
    public function __construct(ShoppingPaynow $paynow)
    {
        $this->paynow = $paynow;

    }

    /**
     * Execute the job.
     *
     * @param PaymentService $payment_service
     * @return void
     */
    public function handle(PaymentService $payment_service)
    {


        Log::debug("Account from helper".$this->paynow->check_url);

        $client = new GuzzleHttp\Client(['verify'=>false]);
        $res = $client->request('POST', $this->paynow->check_url);

        Log::debug("url from helper ".$this->paynow->check_url);

        (new Helper)->shoppingPaymentStatus($res->getBody(), $this->paynow);
    }
}
