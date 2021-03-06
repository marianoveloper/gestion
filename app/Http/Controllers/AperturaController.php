<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Apertura;
use App\Mail\Notificacion;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            'subcategory_id'=>'required',
            'title'=>'required',
            'descripcion'=>'required',
            'perfil'=>'required',
            'alcances'=>'required',
            'objetivos'=>'required',
            'destinatarios'=>'required',
            'requisitos'=>'required',
            'duracion'=>'required',
            'file'=>'required|mimes:pdf|max:2048',
            'resol'=>'required|mimes:pdf|max:2048',



           ]);



           $carrera=Apertura::create($request->all());

           //plan de estudio
           if($request->file('file')){
            $url=Storage::put('carrera', $request->file('file'));
            $name=$request->file('file')->hashName();
        }

        $carrera->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);

        //resolucion
        if($request->file('resol')){
            $url=Storage::put('carrera', $request->file('resol'));
            $name=$request->file('file')->hashName();
        }

        $carrera->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);


        $correo=auth()->user()->email;
        $subject="Solicitud de Apertura de Carrera Virtual";

       $mail=new Notificacion($subject,$correo);


        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);

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
