<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MatriculacionExamen;
use App\Http\Controllers\Controller;

class MatriculacionExamenController extends Controller
{
    public function index()
    {
        $matriculacion=MatriculacionExamen::all();
        return view('admin.examen.matriculacion.index',compact('matriculacion'));
    }
}
