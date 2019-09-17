<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class register extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $MailBody;

    // 讓外部可以將參數指定進來
    public function __construct($MailBody)
    {
        $this->MailBody = $MailBody;
    }

    public function build()
    {
        // 透過 with 把參數指定給 view
        return $this->subject("註冊成功")
            ->view('email.register')
            ->with([
                'content' => $this->MailBody,
            ]);
    }
}
