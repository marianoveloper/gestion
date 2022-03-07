<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


}
