<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentAlert extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $enquiry;
    public $quotation;
    public $order;
    public $payment;

    /**
     * Create a new message instance.
     * @param User $user
     * @param $order
     * @param $payment
     * @internal param Customer $Customer
     */
    public function __construct(User $user, $order ,$payment){
        $this->user = $user;
        $this->order = $order;
        $this->payment = $payment;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.payment.payment_alert')
            ->subject('[Ordering] Payment Alert for Order #' . $this->order)
            ;
    }
}
