<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Propuesta;
use App\Mail\Notificacion;
use App\Models\Subcategoria;
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
        $subcategoria=Subcategoria::pluck('name','id');
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


            'sede_id'=>'required',
            'academic_id'=>'required',
            'subcategoria_id'=>'required',
            'title'=>'required',
            'objetivos'=>'required',
            'destinatarios'=>'required',
            'requisitos'=>'required',
            'duracion'=>'required',
            'cupo'=>'required',
            'date_start'=>'required|date|after:tomorrow',
            'costo'=>'required',
            'tipo_resol'=>'required',
            'link_pago'=>['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'descripcion'=>'required|mimes:pdf|max:2048',
            'programa'=>'required|mimes:pdf|max:2048',
            'resol'=>'required|mimes:pdf|max:2048',
            'cv'=>'required|mimes:pdf|max:2048',
            'flyer'=>'image',



           ]);



           $propuesta=Propuesta::create($request->all());

           //cv propuesta
           if($request->file('cv')){
            $url=Storage::put('cvpuccv', $request->file('cv'));
            $name=$request->file('cv')->hashName();
        }

        $propuesta->resource()->create([
            'url'=>$url,
                    'name'=>$name,
                ]);

        //descripcion puccv
        if($request->file('descripcion')){
            $url=Storage::put('descripcionpuccv', $request->file('descripcion'));
            $name=$request->file('descripcion')->hashName();
        }

        $propuesta->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);

            //programa puccv
            if($request->file('programa')){
                $url=Storage::put('programapuccv', $request->file('programa'));
                $name=$request->file('programa')->hashName();
            }

            $propuesta->resource()->create([
                'url'=>$url,
                'name'=>$name,
            ]);


        //resolucion puccv
        if($request->file('resol')){
            $url=Storage::put('resolpuccv', $request->file('resol'));
            $name=$request->file('resol')->hashName();
        }

        $propuesta->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);


        //flyer puccv
        if($request->file('flyer')){
            $url=Storage::put('flyerpuccv', $request->file('flyer'));
            $name=$request->file('flyer')->hashName();

        }

        $propuesta->image()->create([
            'url'=>$url,

        ]);


        //Datos responsables puccv

        if($request->file('file')){
            $url=Storage::put('responsablespucvv', $request->file('file'));
            $name=$request->file('file')->hashName();

        }

         $propuesta->resource()->create([
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
