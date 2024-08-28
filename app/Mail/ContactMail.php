<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $contact_name;
    public $contact_email;
    public $contact_message;
    
    public function __construct($name, $email, $message)
    {
        $this->contact_name = $name;
        $this->contact_email = $email;
        $this->contact_message = $message;
    }

    public function build()
    {
        return $this->from($this->contact_email, $this->contact_name)
        ->subject('Email contact from '. $this->contact_name)
        ->view('Email/test');

        // rescources/views/mails/contact.blade.php
       
    }
}
