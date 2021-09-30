<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',        
        'last_name',
        'email',
        'cel',
    ];
    //relacion uno a muchos inversa

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
