<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Apertura;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AperturaController extends Controller
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
        return view('carrera.index',compact('academica','carrera','sede','subcategoria'));
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
        $request->validate([

            'contacto'=>'required',
            'academic_id'=>'required',
            'carrera_id'=>'required',

            'file'=>'required|mimes:xls,xlsx,docx|max:2048',

           ]);



           $carrera=Apertura::create($request->all());

           if($request->file('file')){
            $url=Storage::put('carrera', $request->file('file'));

        }

        $carrera->resource()->create([
            'url'=>$url,
        ]);


        return redirect()->route('carrera.index')
        ->with('info','La solicitud fue enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apertura  $apertura
     * @return \Illuminate\Http\Response
     */
    public function show(Apertura $apertura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apertura  $apertura
     * @return \Illuminate\Http\Response
     */
    public function edit(Apertura $apertura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apertura  $apertura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apertura $apertura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apertura  $apertura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apertura $apertura)
    {
        //
    }
}
