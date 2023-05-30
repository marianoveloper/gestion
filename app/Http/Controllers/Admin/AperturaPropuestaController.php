<?php

namespace App\Http\Controllers\Admin;
use App\Models\AperturaPropuesta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AperturaPropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.propuesta.apertura.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aperturapropuesta $propuesta)
    {

        dd($propuesta);
        return view('admin.propuesta.apertura.show',compact('propuesta'));
    }



}
