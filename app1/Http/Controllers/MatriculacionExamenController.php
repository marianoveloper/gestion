<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatriculacionExamen;
use App\Models\Carrera;
use App\Models\Academic;
use App\Mail\Notificacion;
use Illuminate\Support\Carbon;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MatriculacionExamenController extends Controller
{
    public function index(){

        return view('examen.matriculacion.index');

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

        'date_start'=>'required|date|after:tomorrow',
        'time_start'=>'required',
        'academic_id'=>'required',
        'carrera_id'=>'required',
        'materia_id'=>'required',
        'file'=>'required|mimes:xls,xlsx|max:2048',


       ],

    [
        'date_start.after'=>'La fecha ingresada debe ser 48hs antes de la fecha del examen',
        'date_start.required'=>'La fecha es obligatoria',
        'time_start.required'=>'La hora es obligatoria',
        'academic_id.required'=>'La unidad académica es obligatoria',
        'carrera_id.required'=>'La carrera es obligatoria',
        'materia_id.required'=>'La materia es obligatoria',
        'file.required'=>'El archivo es obligatorio',
        'file.mimes'=>'El archivo debe ser de tipo xls o xlsx',
        'file.max'=>'El archivo no debe superar los 2MB',
    ]
    );


       $matriculacion=MatriculacionExamen::create($request->all());

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

        $subject="Matriculación Examen Final de la carrera ".$matriculacion->carrera->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);


    return redirect()->route('matriculacionexamen.index',$matriculacion)
    ->with('info','La solicitud fue enviada');
    }
}
