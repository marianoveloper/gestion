<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Academic;
use App\Mail\Notificacion;
use Illuminate\Http\Request;
use App\Models\Matriculacion;
use Illuminate\Support\Carbon;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MatriculacionController extends Controller
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
        return view('matriculacion.index',compact('academica','carrera'));
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
        'carrera_id'=>'required',
        'materia_id'=>'required',
        'date_start'=>'required|date|after:tomorrow',
        'time_start'=>'required',
        'file'=>'required|mimes:xls,xlsx|max:2048',

       ],
    [
        'tipo.required'=>'El campo tipo es obligatorio',
        'academic_id.required'=>'El campo académica es obligatorio',
        'carrera_id.required'=>'El campo carrera es obligatorio',
        'materia_id.required'=>'El campo materia es obligatorio',
        'date_start.after'=>'La fecha ingresada debe ser 48hs posterior al día de hoy',
        'time_start.required'=>'El campo hora de inicio es obligatorio',
        'file.required'=>'El campo archivo es obligatorio',
        'file.mimes'=>'El archivo debe ser de tipo xls o xlsx',
        'file.max'=>'El archivo no debe superar los 2MB',
    ]
    );


       $matriculacion=Matriculacion::create($request->all());

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

        $subject="Matriculación en ".$matriculacion->carrera->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);


    return redirect()->route('matriculacion.index',$matriculacion)
    ->with('info','La solicitud fue enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matriculacion  $matriculacion
     * @return \Illuminate\Http\Response
     */
    public function show(Matriculacion $matriculacion)
    {
       return;
    }


}
