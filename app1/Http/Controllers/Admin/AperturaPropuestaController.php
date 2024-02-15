<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AperturaPropuesta;
use App\Http\Controllers\Controller;

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
    public function show(int $id)
    {
        $propuesta=AperturaPropuesta::find($id);
        //dd($propuesta);

        return view('admin.propuesta.apertura.show',compact('propuesta'));
    }



}
