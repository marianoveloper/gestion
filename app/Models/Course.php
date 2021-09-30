<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded=['id','status'];

    const Borrador=1;// no visible falta completar datos
    const Revision=2;//no visible falta aprobacion
    const Publicado=3;//estan visible en la pagina
    const Activo=1;//habilitado inscripcion o pre-inscripcion
    const Proximamente=2;//visible sin inscripcion o pre-inscripcion con fecha proxima abrir
    const Finalizado=3;//visible
    const Permanente=4;



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

//muchos a muchos trae los profesores en los cursos
    public function teacher(){
        return $this->belongsToMany('App\Models\Teacher');
    }
    public function student(){
        return $this->belongsToMany('App\Models\Student');
    }
    //relacion uno a muchos trae los usuarios en los cursos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion uno a muchos un curso puede tener muchos reviews
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    //relacion uno a muchos

    public function sede(){
        return $this->belongsTo('App\Models\Sede');

    }
//relacion academica con curso
    public function academic(){
        return $this->hasManyThrough('App\Models\Academic','App\Models\Sede');

    }


/*
    public function category(){
        return $this->belongsTo('App\Models\Category');

    }*/
    public function type(){
        return $this->belongsTo(Type::class);

    }

    public function requirements(){

        return $this->hasMany('App\Models\Requirement');
    }
    public function payment(){
        return $this->hasOne('App\Models\Payment');
    }

    public function goals(){

        return $this->hasMany('App\Models\Goal');
    }

    public function sections(){

        return $this->hasMany('App\Models\Section');
    }

    public function questions(){

        return $this->hasMany('App\Models\Question');
    }

    public function resolutions(){

        return $this->hasMany('App\Models\Resolution');
    }

    // relacion uno a uno polimorfica

    public function resource(){

        return $this->morphOne('App\Models\Resource','resourceable');
    }

    public function image(){

        return $this->morphOne('App\Models\Image','imageable');
    }


}
