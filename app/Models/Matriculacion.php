<?php

namespace App\Models;

use App\Models\Sede;
use App\Models\User;
use App\Models\Image;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matriculacion extends Model
{
    use HasFactory;
    protected $guarded=['id','status'];

    const Estudiante=1;
    const Profesor=2;
    const Tutor=3;
    const AsesorPedagógico=4;
    const ReferenteVirtual=5;
    const Coordinador=6;
    const Director=7;

    const Activo=1;
    const Proceso=2;
    const Hecho=3;

/***query scopes********************* */
public function scopeCarrera($query,$carrera_id){

    if($carrera_id){
        return $query->where('carrera_id',$carrera_id);
    }
}
public function scopeAcademic($query,$academic_id){

    if($academic_id){
        return $query->where('academic_id',$academic_id);
    }
}

public function scopeStatus($query,$status){

    if($status){
        return $query->where('status',$status);
    }
}

public function scopeTipo($query,$tipo){

    if($tipo){
        return $query->where('tipo',$tipo);
    }
}

  //relacion uno a muchos trae los usuarios en los cursos
  public function user(){
    return $this->belongsTo(User::class);
}

/*relacion academica con curso
public function academic(){
    return $this->hasManyThrough(Academic::class,Sede::class);

}*/

public function academic(){

    return $this->belongsTo(Academic::class);

}

public function carrera(){
    return $this->belongsTo(Carrera::class);

}

    public function resource(){

        return $this->morphOne(Resource::class,'resourceable');
    }

    public function image(){

        return $this->morphOne(Image::class,'imageable');
    }
}
