<?php

namespace App\Http\Controllers\Solicitudes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesmatriculacionPropuestaController extends Controller
{
    public function index()
    {

        return view('solicitudes.desmatriculacionPropuesta.index');
    }
}
