<?php


namespace App\Values;



use App\Strategies\Interactives\Img;
use App\Strategies\Interactives\Asistencia;
use App\Strategies\Interactives\Dev;
use App\Strategies\Interactives\NotFound;
use App\Strategies\Interactives\Question;

use App\Strategies\Interactives\Propuesta;

final class Interactive {
    const GET_STRATEGY=[

      '0'=>Propuesta::class,
      '1'=>Asistencia::class,
      '2'=>Img::class,
      '3'=>Dev::class,

    ];



    static function getStrategy( $value )
    {
        if ( key_exists( $value, self::GET_STRATEGY ) ) {
            return self::GET_STRATEGY[ $value ];
        }
        return NotFound::class;
    }
}
