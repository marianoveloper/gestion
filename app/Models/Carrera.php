<?php

namespace App\Models;

use App\Models\Sede;
use App\Models\Academic;
use App\Models\Matriculacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends Model
{
    use HasFactory;

    protected $guarded=['id'];

      //relacion uno a muchos trae los usuarios en los cursos
  public function user(){
    return $this->belongsTo(User::class);
}

//relacion academica con curso
public function academic(){
    return $this->hasManyThrough(Academic::class,Sede::class);

}
public function matriculacions(){
    return $this->hasMany(Matriculacion::class);
}

public function catedras(){
    return $this->hasMany(Catedra::class);
}
public function materia(){

    return $this->belongsTo(Materia::class);
}

}
