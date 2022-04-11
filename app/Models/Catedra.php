<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catedra extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    const Activo=1;
    const Hecho=2;

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
