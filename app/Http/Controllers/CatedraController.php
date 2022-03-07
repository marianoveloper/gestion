<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Catedra;
use App\Models\Academic;
use App\Mail\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CatedraController extends Controller
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
        return view('catedra.index',compact('academica','carrera'));
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
        'academic_id'=>'required',
        'carrera_id'=>'required',

        'file'=>'required|mimes:xls,xlsx,docx|max:2048',

       ]);



       $catedra=Catedra::create($request->all());

       if($request->file('file')){
        $url=Storage::put('catedra', $request->file('file'));

    }

    $catedra->resource()->create([
        'url'=>$url,
    ]);

    $correo=auth()->user()->email;
    $subject="Solicitud de Apertura de Cátedra";

   $mail=new Notificacion($subject,$correo);


    Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
    return redirect()->route('catedra.index',$catedra)
    ->with('info','La solicitud fue enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catedra  $catedra
     * @return \Illuminate\Http\Response
     */
    public function show(Catedra $catedra)
    {
        return;
    }

}
