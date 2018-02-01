<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $text)
    {
        $this->email = $email;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-mail')
            ->with([
                'email' => $this->email,
                'text' => $this->text
            ])
            ->subject('You have new  msg');
    }
}
