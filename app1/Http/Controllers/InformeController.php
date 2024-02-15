<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class InformeController extends Controller
{
   public function index(){

    return view('informe.index');


   }


   public function store(Request $request){

    $request->validate([

        'semestre'=>'required',
        'academic_id'=>'required',
        'carrera_id'=>'required',
        'destinado'=>'required',
        'materias'=>'required',



       ],
    [
        'semestre.required'=>'El campo semestre es obligatorio',
        'destinado.required'=>'El campo destinado es obligatorio',
        'academic_id.required'=>'El campo académica es obligatorio',
        'carrera_id.required'=>'El campo carrera es obligatorio',
        'materias'=>'El campo materia es obligatorio',

    ]
    );


    $matriculacion=Informe::create($request->all());





     $correo=auth()->user()->email;
        $academic=$matriculacion->academic->name;

        $subject="Solicitud de Informe de ".$matriculacion->carrera->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);


    return redirect()->route('informe.index',$matriculacion)
    ->with('info','La solicitud fue enviada');

  }
}
