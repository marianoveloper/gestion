<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //relacion de uno a muchos
   public function sede(){
       return $this->belongsTo('App\Models\Sede');

    }


}
