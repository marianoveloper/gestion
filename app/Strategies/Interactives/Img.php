<?php


namespace App\Strategies\Interactives;


use App\Conversations\Interactives;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class Img extends Conversation implements IStrategy {

   use ReturnOrExit;

    public function run()
    {
        // TODO: Implement run() method.

        $url=url('storage/chatbot/contactos.jpeg');
        $attachment=new Image($url);
        $response=OutgoingMessage::create('Desde el DEV no administramos los campus correspondientes a las cátedras de apoyatura a la presencialidad. Por lo que debes comunicarte con: ')//mensaje de salida
            ->withAttachment($attachment);
        $this->say($response);
        $this->returnOrExit(Interactives::class);
    }
}
