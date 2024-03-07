<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $contacto;
    public $academica;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$contacto,$academica)
    {
        $this->subject=$subject;
        $this->contacto=$contacto;
        $this->academica=$academica;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.notification');
    }
}