<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeOrg extends Mailable
{
    use Queueable, SerializesModels;


    public $name,$pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$pass)
    {
        $this->name=$name;
        $this->pass=$pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.mail.welcomeorg');
    }
}
