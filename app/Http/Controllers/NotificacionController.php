<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use App\Mail\EmailMatriculacion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class NotificacionController extends Controller
{
  public function index(){
    return view('notificacion.index');
  }

  public function store(Request $request){

    $request->validate([

        'tipo'=>'required',
        'academic_id'=>'required',
        'carrera_id'=>'required',
        'materia_id'=>'required',

        'file'=>'required|mimes:xls,xlsx|max:2048',

       ],
    [
        'tipo.required'=>'El campo tipo es obligatorio',
        'academic_id.required'=>'El campo académica es obligatorio',
        'carrera_id.required'=>'El campo carrera es obligatorio',
        'materia_id.required'=>'El campo materia es obligatorio',

        'file.required'=>'El campo archivo es obligatorio',
        'file.mimes'=>'El archivo debe ser de tipo xls o xlsx',
        'file.max'=>'El archivo no debe superar los 2MB',
    ]
    );


    $matriculacion=Notificacion::create($request->all());

       if($request->file('file')){
        $name=$request->file('file')->getClientOriginalName();
        //$url=Storage::put('matriculaciones', $request->file('file'));
        $url=Storage::putFileAs('notificaciones',$request->file('file'),$name);
        //$name=$request->file('file')->hashName();

      }

//dd($name);

    $matriculacion->resource()->create([
        'url'=>$url,
        'name'=>$name,
    ]);



     $correo=auth()->user()->email;
        $academic=$matriculacion->academic->name;

        $subject="Notificación de Matriculación Manual en ".$matriculacion->carrera->name;

        $mail=new EmailMatriculacion($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo);
        $confirmation=new EmailMatriculacion($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);


    return redirect()->route('notificacion.index',$matriculacion)
    ->with('info','La solicitud fue enviada');

  }
}
