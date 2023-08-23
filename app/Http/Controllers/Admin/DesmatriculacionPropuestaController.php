<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DesmatriculacionPropuesta;

class DesmatriculacionPropuestaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $desmatriculacion=DesmatriculacionPropuesta::all();

        return view('admin.propuesta.desmatriculacion.index',compact('desmatriculacion'));
    }

}
