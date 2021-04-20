<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RechargeSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($owner, $bill)
    {
        $this->owner = $owner;
        $this->bill = $bill;

        if ($this->bill->vnpay_bill) {
            $this->payment_type = 'Chuyển khoản qua VNPAY';
        } else {
            $this->payment_type = 'Chuyển khoản trực tiếp';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(config('app.url') . ' - Thông báo nạp tiền vào tài khoản')
            ->view('mails.recharge_success')
            ->with([
                'owner' => $this->owner,
                'bill' => $this->bill,
                'payment_type' => $this->payment_type,
            ]);
    }
}