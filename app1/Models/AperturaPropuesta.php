<?php

namespace App\Models;

use App\Models\Sede;
use App\Models\User;
use App\Models\Image;
use App\Models\Academic;
use App\Models\Resource;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AperturaPropuesta extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function scopeSubcategory($query,$subcategory_id){

        if($subacategory_id){
            return $query->where('subcategory_id',$subcategory_id);
        }
    }
    //relacion uno a muchos trae los usuarios en los cursos
    public function user(){
        return $this->belongsTo(User::class);
    }

  //relacion academica con curso
public function academic(){
    return $this->belongsTo(Academic::class);

}
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
        public function resource(){

            return $this->morphOne(Resource::class,'resourceable');
        }

        public function image(){

            return $this->morphOne(Image::class,'imageable');
        }

 public function sede(){
       return $this->belongsTo(Sede::class);

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


}
