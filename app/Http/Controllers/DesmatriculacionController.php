<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesmatriculacionController extends Controller
{
    public function index()
    {

        return view('desmatriculacion.index');
    }
}
