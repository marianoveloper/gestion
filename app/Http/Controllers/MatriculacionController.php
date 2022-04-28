<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Academic;
use Illuminate\Http\Request;
use App\Models\Matriculacion;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Notificacion;

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
        'date_start'=>'required|date',
        'time_start'=>'required|time',
        'file'=>'required|mimes:xls,xlsx|max:2048',

       ]);



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


    $tipo="";
    if($request->tipo==1){
        $tipo="Estudiante";
    }
    else{
        $tipo="Profesores";
    }
    $subject="Matriculación de ".$tipo;

   $mail=new Notificacion($subject,$correo);


    Mail::to($correo)->send($mail);

    return redirect()->route('matriculacion.index',$matriculacion)
    ->with('info','Archivo fue enviado');
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
