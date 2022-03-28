<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Propuesta;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academica=Academic::pluck('name','id');
        $carrera=Carrera::pluck('name','id');
        $sede=Sede::pluck('name','id');
        $subcategoria=Subcategory::pluck('name','id');
        return view('propuesta.index',compact('academica','carrera','sede','subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Propuesta $propuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Propuesta $propuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propuesta $propuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propuesta $propuesta)
    {
        //
    }
}
