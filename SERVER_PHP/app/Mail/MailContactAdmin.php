<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContactAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_input)
    {
        $this->input = $_input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        // ->from('sender@example.com')
        ->view('mail.contact-admin.view')
        ->text('mail.contact-admin.plain')
        ->subject('Hey admin! There are user requesting contact');
    }
}
