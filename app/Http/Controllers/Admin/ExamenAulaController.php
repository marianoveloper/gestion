<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamenAula;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamenAulaController extends Controller
{
    public function index()
    {
        $matriculacion=ExamenAula::all();
        return view('admin.examen.aula.index',compact('matriculacion'));
    }
}
