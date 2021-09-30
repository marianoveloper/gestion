<?php


namespace App\Strategies\Interactives;


trait ReturnOrExit {
    private function returnOrExit($conversation){
        $this->ask('Deseas continuar SI o NO?',[
            [
                'pattern'=>'si|s',
                'callback'=>function() use($conversation){
                    $this->getBot()->startConversation(new $conversation());
                }
            ],
            [
                'pattern'=>'no|n',
                'callback'=>function(){
                    $this->say('Gracias por contactarnos.Por mas consultas puedes contactarnos a traves de whatsapp o a través de nuestras vías de comunicación');
                }
            ]
        ]);
    }
}
