<?php

namespace App\Http\Controllers\Admin;

use App\Models\Informe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformeController extends Controller
{
    public function index()
    {

        $matriculacion=Informe::all();
        return view('admin.informe.index',compact('matriculacion'));
    }
}
