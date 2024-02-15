<?php

namespace App\Http\Controllers\Solicitudes;

use Illuminate\Http\Request;
use App\Models\Matriculacion;
use App\Http\Controllers\Controller;

class MatriculacionController extends Controller
{
    public function index()
    {

        return view('solicitudes.matriculacion.index');
    }
}
