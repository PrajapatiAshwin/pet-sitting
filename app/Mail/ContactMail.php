<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->from('ashwincumulative123@gmail.com', 'Pet-Sitting')
            ->subject($this->contactData['subject'])
            ->view('user.mail.contact-mail-page')
            ->with('contactData', $this->contactData);
    }
}
