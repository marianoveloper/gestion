<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function academics(){
        return $this->hasMany('App\Models\Academic');
    }
}
