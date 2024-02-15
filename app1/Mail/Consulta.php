<?php

namespace App\Mail;


use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Consulta extends Mailable
{
    use Queueable, SerializesModels;

        //public $subject="Consulta de Gestión Virtual";

        public $subject = "Consulta desde Sistema de Gestión Virtual";
        public $contacto;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($contacto)
        {
            $this->contacto=$contacto;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->view('mail.consulta');
        }
}
