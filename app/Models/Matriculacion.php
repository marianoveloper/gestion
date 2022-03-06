<?php

namespace App\Models;

use App\Models\Sede;
use App\Models\User;
use App\Models\Image;
use App\Models\Academic;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matriculacion extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    const Alumno=1;
    const Docente=2;

  //relacion uno a muchos trae los usuarios en los cursos
  public function user(){
    return $this->belongsTo(User::class);
}

//relacion academica con curso
public function academic(){
    return $this->hasManyThrough(Academic::class,Sede::class);

}

    public function resource(){

        return $this->morphOne(Resource::class,'resourceable');
    }

    public function image(){

        return $this->morphOne(Image::class,'imageable');
    }
}
