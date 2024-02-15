<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //Relacion uno a muchos
    public function types(){
        return $this->hasMany(Type::class);
    }

    public function courses(){
        return $this->hasManyThrough(Course::class, Type::class);
    }

    public function getRouteKeyName(){return 'slug';}
}
