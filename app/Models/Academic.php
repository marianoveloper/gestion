<?php

namespace App\Models;

use App\Models\Catedra;
use App\Models\Matriculacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Academic extends Model
{
    use HasFactory;


    protected $guarded=['id'];

    public function matriculacions(){
        return $this->hasMany(Matriculacion::class);
    }

    public function catedras(){
        return $this->hasMany(Catedra::class);
    }
 public function sede(){
       return $this->belongsTo(Sede::class);

    }
}
