<?php

namespace App\Models;

use App\Models\Sede;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apertura extends Model
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
