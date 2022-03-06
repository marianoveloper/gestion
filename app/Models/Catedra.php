<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catedra extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    const Borrador=1;
    const Activo=2;

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
