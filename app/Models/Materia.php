<?php

namespace App\Models;

use App\Models\Carrera;
use App\Models\Catedra;
use App\Models\Matriculacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $guarded=['id'];

      //relacion uno a muchos trae los usuarios en los cursos
  public function user(){
    return $this->belongsTo(User::class);
}

//relacion academica con curso
public function carrera(){
    return $this->hasMany(Carrera::class);

}
public function matriculacions(){
    return $this->hasMany(Matriculacion::class);
}

public function catedras(){
    return $this->hasMany(Catedra::class);
}
}
