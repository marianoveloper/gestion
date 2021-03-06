<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Academic;
use App\Models\Propuesta;
use App\Mail\Notificacion;
use Illuminate\Http\Request;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\MatriculacionPropuesta;
use Illuminate\Support\Facades\Storage;

class MatriculacionPropuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academica=Academic::pluck('name','id');
        $propuesta=Propuesta::pluck('name','id');
       return view('propuesta.matriculacion.index',compact('academica'));
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

            'tipo'=>'required',
            'academic_id'=>'required',
            'propuesta_id'=>'required',
            'date_start'=>'required|date',
            'file'=>'required|mimes:xls,xlsx|max:2048',

           ]);

           $matriculacion=MatriculacionPropuesta::create($request->all());

           if($request->file('file')){
            $name=$request->file('file')->getClientOriginalName();
            //$url=Storage::put('matriculaciones', $request->file('file'));
            $url=Storage::putFileAs('matriculaciones',$request->file('file'),$name);
            //$name=$request->file('file')->hashName();

        }

    //dd($name);

        $matriculacion->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);



        $correo=auth()->user()->email;
        $academic=$matriculacion->academic->name;

        $subject="Matriculación de ".$matriculacion->propuesta->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo,$academic);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);

        return redirect()->route('matriculacion-propuestas.index',$matriculacion)
        ->with('info','La solicitud fue enviado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
