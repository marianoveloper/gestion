<?php


namespace App\Strategies\Interactives;


use App\Conversations\Interactives;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class Dev extends Conversation implements IStrategy {

   use ReturnOrExit;

    public function run()
    {
        // TODO: Implement run() method.

        $url=url('storage/chatbot/contactos.jpeg');
        $attachment=new Image($url);
        $response=OutgoingMessage::create('Estos son nuestras vias de comunicación: ')//mensaje de salida
            ->withAttachment($attachment);
        $this->say($response);
        $this->returnOrExit(Interactives::class);
    }
}
