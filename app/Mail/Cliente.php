<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Cliente extends Mailable
{
    use Queueable, SerializesModels;

    public $libro;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($libro)
    {
        //
        $this->libro = $libro;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notificacion');
    }

}
