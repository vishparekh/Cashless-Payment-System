<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$pass,$role;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$pass,$role)
    {
        //
        $this->name=$name;
        $this->pass=$pass;
        $this->role=$role;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.welcomeuser')->with(['name'=>$this->name,'pass'=>$this->pass,'role'=>$this->role]);
    }
}
