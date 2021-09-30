<?php

namespace App\Conversations;

use App\Values\Operator;
use App\Values\Interactive;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Interactives extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->askInteractive();
    }

    private function askInteractive()
    {
        $question=Question::create('Que deseas hacer?')
            ->fallback('No se pudo responder la pregunta')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Propuestas Virtuales')->value('0'),
                Button::create('Asistencia Campus virtual')->value('1'),
                Button::create('Apoyatura a la Presencialidad')->value('2'),
                Button::create('Contactos del Departamento de Educación Virtual')->value('3'),
            ]);
        return $this->ask($question,function (Answer $answer){
            //$this->say($answer->getValue());
            if($answer->isInteractiveMessageReply()){
                $content=Interactive::getStrategy($answer->getValue());
                $this->getBot()->startConversation(new $content());
            }

        });


    }

}
