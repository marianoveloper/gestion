<?php


namespace App\Strategies\Interactives;


use App\Models\Course;
use App\Conversations\Interactives;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;


class Asistencia extends Conversation implements IStrategy {

    use ReturnOrExit;

    public function run()
    {
        $this->askQuestion();

    }

    private function askQuestion()
    {
        $question=Question::create('Cual es tu consulta?')
            ->fallback('No se pudo responder la pregunta')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Blanqueo de clave del Campus virtual')->value('0'),
                Button::create('Manejo del Campus para alumnos')->value('1'),
                Button::create('Manejo del Campus para docentes')->value('2'),
                Button::create('Volver al menu anterior')->value('3'),
            ]);
        return $this->ask($question,function (Answer $answer){
            if($answer->getValue()==0){
                $this->askBlanqueo();
            }elseif($answer->getValue()==1){
                $this->askAlumnos();
            }elseif($answer->getValue()==2){
                $this->askDocente();
            }else{
                $this->finish();
            }
        });
    }
    private function askBlanqueo()
    {

                $this->say('Compartimos el contacto de WhatsApp ( +549 2644127532)
                o vía mail (CAMPUSVIRTUAL@UCCUYO.EDU.AR - UCCUYOVIRTUAL@UCCUYO.EDU.AR)

                 Debes enviarnos:
                ');
                $this->say(' Nombre y Apellido:
                Correo:
                Carrera/Curso matriculado:
                DNI:');
                $this->say(' Para que nuestros asistentes te puedan corroborar el funcionamiento de tu usuario y realizar el blanqueo de clave.');
                $this->returnOrExit(Interactives::class);

    }
    private function askAlumnos()
    {
        $this->say("Encontrarás los instructivos y guías para el uso y manejo del CAMPUS en (ENLACE INSTRUCTIVOS)");

        $this->say('http://campusvirtual.evirtualsj.com/');
        $this->returnOrExit(Interactives::class);
    }
    private function askDocente()
    {
        $this->say("Encontrarás los instructivos y guías para el uso y manejo del CAMPUS en (ENLACE INSTRUCTIVOS)");

        $this->say('http://campusvirtual.evirtualsj.com/docentes.html');
        $this->returnOrExit(Interactives::class);
    }
    private function finish(){

        $this->returnOrExit(Interactives::class);
    }
}
