<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apertura;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AperturaController extends Controller
{
    public function show(Apertura $carrera)
    {

        return view('admin.carrera.show',compact('carrera'));
    }
}
