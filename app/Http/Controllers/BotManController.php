<?php
namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\Operations;
use App\Conversations\Interactives;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');



        $botman->listen();
    }





    public function startInteractive(BotMan $bot){

        $bot->startConversation(new Interactives());
    }

}
