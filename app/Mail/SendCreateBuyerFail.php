<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCreateBuyerFail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name,$c;

    public function __construct($name,$c)
    {
        //
        $this->name=$name;
        $this->c=$c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sendcreatebuyerfail')->with(['name'=>$this->name,'c'=>$this->c]);
    }
}
