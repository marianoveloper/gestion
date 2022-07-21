<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriculacionExamenController extends Controller
{
    public function index(){

        return view('examen.matriculacion.index');

    }
}
