<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //relacion uno a muchos trae los usuarios en los cursos
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function academic(){

        return $this->belongsTo(Academic::class);

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
}
