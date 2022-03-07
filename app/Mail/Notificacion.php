<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $contacto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$contacto)
    {
        $this->subject=$subject;
        $this->contacto=$contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.notificacion');
    }
}
