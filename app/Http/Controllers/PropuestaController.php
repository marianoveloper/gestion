<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Propuesta;
use App\Mail\Notificacion;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $sede=Sede::pluck('name','id');
        $subcategoria=Subcategory::pluck('name','id');
        return view('propuesta.index',compact('academica','sede','subcategoria'));
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
            'sede_id'=>'required',
            'academic_id'=>'required',
            'subcategoria_id'=>'required',
            'title'=>'required',
            'descripcion'=>'required',
            'objetivos'=>'required',
            'destinatarios'=>'required',
            'requisitos'=>'required',
            'duracion'=>'required',
            'cupo'=>'required',
            'date_start'=>'required|date',
            'file'=>'required|mimes:pdf|max:2048',
            'resol'=>'required|mimes:pdf|max:2048',



           ]);



           $carrera=Propuesta::create($request->all());

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

        return redirect()->route('propuesta.index')
        ->with('info','La solicitud fue enviada');
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
