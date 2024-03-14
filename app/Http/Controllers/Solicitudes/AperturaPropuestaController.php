<?php

namespace App\Http\Controllers\Solicitudes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AperturaPropuestaController extends Controller
{
    public function index()
    {

        return view('solicitudes.aperturaPropuesta.index');
    }
}
