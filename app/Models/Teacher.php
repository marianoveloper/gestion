<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',        
        'last_name',
        'email',
        'cel',
    ];

    public function courses(){

        return $this->belongsToMany('App\Models\Course');
    }
}
