<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    //relacion uno a muchos
    const Inscripcion=1;//Boton inscripcion
    const PreInscripcion=2;// Boton Pre-Inscripcion

    const Contado=1;
    const Cuotas=2;
    const Gratuito=3;



    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
