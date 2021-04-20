<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdvisoryRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(config('app.url') . ' - Thông báo khách hàng có số điện thoại ' . $this->data['phone'] . ' yêu cầu bạn liên hệ lại!')
            ->view('mails.advisory_request', ['data' => $this->data]);
    }
}