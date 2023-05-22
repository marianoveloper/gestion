<?php

namespace App\Http\Controllers;

use App\Models\AperturaPropuesta;
use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
class AperturaPropuestaController extends Controller
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

        return view('propuesta.index',compact('academica','sede'));
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

            'academic_id'=>'required',
            'subcategory'=>'required',
            'title'=>'required',
            'objetivos'=>'required',
            'destinatarios'=>'required',
            'requisitos'=>'required',
            'modalidad'=>'required',
            'duracion'=>'required',
            'cupo'=>'required',
            'date_start'=>'required|date|after:tomorrow',
            'costo'=>'required',
            'link_pago'=>'required',
            'descripcion'=>'required|mimes:pdf',
            'programa'=>'required|mimes:pdf',
            'resol'=>'required|mimes:pdf',
            'cv'=>'required|mimes:pdf',
            'flyer'=>['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],



           ],
        [
            'date_start.after'=>'La fecha de inicio debe ser posterior a la fecha actual',
            'flyer.regex'=>'El campo flyer debe ser una url valida',
            'date_start.required'=>'El campo fecha de inicio es obligatorio',
            'sede_id.required'=>'El campo sede es obligatorio',
            'academic_id.required'=>'El campo académica es obligatorio',
            'subcategory.required'=>'El campo subcategoría es obligatorio',
            'title.required'=>'El campo titulo es obligatorio',
            'objetivos.required'=>'El campo objetivos es obligatorio',
            'destinatarios.required'=>'El campo destinatarios es obligatorio',
            'requisitos.required'=>'El campo requisitos es obligatorio',
            'modalidad.required'=>'El campo modalidad es obligatorio',
            'duracion.required'=>'El campo duración es obligatorio',
            'cupo.required'=>'El campo cupo es obligatorio',
            'costo.required'=>'El campo costo es obligatorio',
            'tipo_resol.required'=>'El campo tipo de resolución es obligatorio',
            'link_pago.required'=>'El campo link de pago es obligatorio',
            'descripcion.required'=>'El campo descripción es obligatorio',
            'descripcion.mimes'=>'El archivo debe ser de tipo pdf',
            'descripcion.max'=>'El archivo no debe superar los 2MB',
            'programa.required'=>'El campo programa es obligatorio',
            'programa.mimes'=>'El archivo debe ser de tipo pdf',

            'resol.required'=>'El campo resolución es obligatorio',
            'resol.mimes'=>'El archivo debe ser de tipo pdf',

            'cv.required'=>'El campo cv es obligatorio',
            'cv.mimes'=>'El archivo debe ser de tipo pdf',

        ]);



           $propuesta=AperturaPropuesta::create($request->all());

            //descripcion puccv
            if($request->file('descripcion')){
                $name=$request->file('descripcion')->getClientOriginalName();

            $url=Storage::putFileAs('propuesta',$request->file('descripcion'),$name);
            }

            $propuesta->resource()->create([
                'url'=>$url,
                'name'=>$name,
            ]);



            //programa puccv
            if($request->file('programa')){
                $name=$request->file('programa')->getClientOriginalName();

                $url=Storage::putFileAs('propuesta',$request->file('programa'),$name);
            }

            $propuesta->resource()->create([
                'url'=>$url,
                'name'=>$name,
            ]);


        //resolucion puccv
        if($request->file('resolucion')){
            $name=$request->file('resolucion')->getClientOriginalName();

           $url=Storage::putFileAs('propuesta',$request->file('resolucion'),$name);
        }

        $propuesta->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);

     //cv propuesta
     if($request->file('cv')){

        $name=$request->file('cv')->getClientOriginalName();

        $url=Storage::putFileAs('propuesta',$request->file('cv'),$name);

     }

     $propuesta->resource()->create([
         'url'=>$url,
                 'name'=>$name,
             ]);




        $correo=auth()->user()->email;
        $academic=$propuesta->academic->name;
        $subject="Solicitud de Apertura de Propuesta Virtual";

        $mail=new EmailNotification($subject,$correo,$academic);
        //$mail=new Notificacion($subject,$correo);
         $confirmation=new EmailConfirmation($subject,$correo,$academic);



         Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
         Mail::to($correo)->send($confirmation);

        return redirect()->route('propuesta.index')
        ->with('info','La solicitud fue enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
