<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;


    protected $guarded=['id'];

    public function matriculacions(){
        return $this->hasMany(Course::class);
    }
 public function sede(){
       return $this->belongsTo('App\Models\Sede');

    }
}
