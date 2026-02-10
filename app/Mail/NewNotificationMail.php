<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fromEmail;
    public $fromName;
    public $name;
    public $messageText;
    public $subject;

    public function __construct($fromEmail, $fromName, $name, $messageText, $subject)
    {
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
        $this->name = $name;
        $this->messageText = $messageText;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->from($this->fromEmail, $this->fromName)
                    ->subject($this->subject)
                    ->view('mail.glary_message');
    }
}
