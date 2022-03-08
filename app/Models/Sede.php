<?php

namespace App\Models;

use App\Models\Academic;
use App\Models\Matriculacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sede extends Model
{
    use HasFactory;

    protected $guarded=['id'];


    public function academics(){
        return $this->hasMany(Academic::class);
    }

    public function matriculacions(){
        return $this->hasManyThrough(Matriculacion::class, Academic::class);
    }

    public function aperturas(){
        return $this->hasManyThrough(Apertura::class, Academic::class);
    }
}
