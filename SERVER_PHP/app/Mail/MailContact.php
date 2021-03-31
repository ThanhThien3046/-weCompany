<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContact extends Mailable
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
        ->view('mail.contact.view')
        ->text('mail.contact.plain');
        // ->with([
        //     'testVarOne' => '1',
        //     'testVarTwo' => '2',
        // ])
        // ->attach(
        //     public_path('/images').'/demo.jpg', [
        //         'as' => 'demo.jpg',
        //         'mime' => 'image/jpeg',
        // ]);
    }
}
