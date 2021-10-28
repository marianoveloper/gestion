<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded=['id','status'];
    const Activo=1;//habilitado inscripcion o pre-inscripcion
    const Borrador=2;// no visible falta completar datos




/***query scopes********************* */
public function scopeCategory($query,$category_id){

    if($category_id){
        return $query->where('category_id',$category_id);
    }
}
public function scopeType($query,$type_id){

    if($type_id){
        return $query->where('type_id',$type_id);
    }
}

public function scopeStatus($query,$status){

    if($status){
        return $query->where('status',$status);
    }
}
public function getRouteKeyName(){

    return "slug";//url de los cursos
}

    //relacion uno a muchos trae los usuarios en los cursos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

   
    public function type(){
        return $this->belongsTo(Type::class);

    }

  


    // relacion uno a uno polimorfica

    public function resource(){

        return $this->morphOne('App\Models\Resource','resourceable');
    }

    public function image(){

        return $this->morphOne('App\Models\Image','imageable');
    }


}
