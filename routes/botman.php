<?php
use App\Conversations\Interactives;
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

/*$botman->hears('Hi|Hola', function ($bot) {

    $bot->reply('Hola como estas!');
});*/

$botman->hears('.*(hola|buenas|buenos días|buenos dias|buenas tardes|buenas noches).*', function ($bot) {

    //Se espera un segundo
    $bot->typesAndWaits(1);
    //Se inicia la conversación
    $bot->startConversation(new Interactives);
});

$botman->fallback(function($bot){

    $bot->reply('Para poder ayudarte elige una de las siguientes opciones:');

    $bot->startConversation(new Interactives);
});

$botman->hears('Ayuda',BotManController::class.'@startInteractive');


$botman->hears('salir',function (\BotMan\BotMan\BotMan $botMan){
    $botMan->reply('Gracias por contactarnos.Por mas consultas puedes contactarnos a traves de whatsapp o a través de nuestras redes');
})->stopsConversation();
