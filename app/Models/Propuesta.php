<?php

namespace App\Models;


use App\Models\Sede;
use App\Models\User;
use App\Models\Image;
use App\Models\Academic;
use App\Models\Resource;
use App\Models\AperturaPropuesta;
use App\Models\MatriculacionPropuesta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Propuesta extends Model
{
    use HasFactory;

    const Cerrado=1;//habilitado inscripcion o pre-inscripcion
    const Activo=2;//visible sin inscripcion o pre-inscripcion con fecha proxima abrir

    protected $guarded=['id'];

    //relacion uno a muchos trae los usuarios en los cursos
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function academic(){

        return $this->belongsTo(Academic::class);

    }
    public function matriculacionpropuestas(){
        return $this->hasMany(MatriculacionPropuesta::class);
    }

        public function resource(){

            return $this->morphOne(Resource::class,'resourceable');
        }

        public function image(){

            return $this->morphOne(Image::class,'imageable');
        }

        public function aperturapropuesta(){

                return $this->hasOne(AperturaPropuesta::class);

        }

 public function sede(){
       return $this->belongsTo(Sede::class);

    }

public function certificados(){

    return $this->hasMany(Certificados::class);
}

 public function scopeStatus($query,$status){

     if($status){
         return $query->where('status',$status);
     }
 }

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

public function scopeSede($query,$sede_id){

 if($sede_id){
     return $query->where('sede_id',$sede_id);
 }
}

public function scopePropuesta($query,$propuesta_id){

 if($propuesta_id){
     return $query->where('propuesta_id',$propuesta_id);
 }

}

}
