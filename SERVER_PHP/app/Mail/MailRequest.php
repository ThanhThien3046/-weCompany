<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRequest extends Mailable
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
        ->view('mail.request.view')
        ->text('mail.request.plain');
    }
}
