<?php


namespace App\Strategies\Interactives;


use App\Models\Course;
use App\Conversations\Interactives;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class Propuesta extends Conversation implements IStrategy {

    use ReturnOrExit;

    public function run()
    {
        $this->askQuestion();

    }

    private function askQuestion()
    {
        $question=Question::create('Cual Propuesta quieres saber?')
            ->fallback('No se pudo responder la pregunta')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Carrera')->value('0'),
                Button::create('Diplomatura y Especialización')->value('1'),
                Button::create('Cursos')->value('2'),
                Button::create('Volver al menu anterior')->value('3'),
            ]);
        return $this->ask($question,function (Answer $answer){
            if($answer->getValue()==0){
                $this->askCarrera();
            }elseif($answer->getValue()==1){
                $this->askDiplomatura();
            }elseif($answer->getValue()==2){
                $this->askCurso();
            }else{
                $this->askInteractive();
            }
        });
    }
    private function askDiplomatura()
    {
        $this->say("Aqui puedes encontrar sobre las Diplomaturas o especializaciónes");

                $this->say('https://www.evirtualsj.com/categories/diplomaturas-y-especializaciones');
                $this->returnOrExit(Interactives::class);
    }
    private function askCurso()
    {
        $this->say("Aqui puedes encontrar sobre los Cursos");

                $this->say('https://www.evirtualsj.com/categories/cursos-de-actualizacion');
                $this->returnOrExit(Interactives::class);
    }
    private function askCarrera()
    {
        $this->say("Aqui puedes encontrar sobre las Carreras");

                $this->say('https://www.evirtualsj.com/categories/carreras');
                $this->returnOrExit(Interactives::class);


    }
    private function finish(){

        $this->returnOrExit(Interactives::class);
    }
}
