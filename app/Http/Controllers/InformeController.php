<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformeController extends Controller
{
   public function index(){

    return view('informe.index');

   }
}
