<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $messageText;
    public $subject;

    public function __construct($name, $messageText, $subject)
    {
        $this->name = $name;
        $this->messageText = $messageText;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->subject($this->subject)->view('mail.customer_message')->text('mail.customer_message_plain'); 
    }
}
