<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Academic;
use Illuminate\Http\Request;
use App\Models\Matriculacion;
use Illuminate\Support\Carbon;
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

        'file'=>'required|mimes:xls,xlsx|max:2048',

       ]);



       $matriculacion=Matriculacion::create($request->all());

       if($request->file('file')){
        $url=Storage::put('matriculaciones', $request->file('file'));

    }

    $matriculacion->resource()->create([
        'url'=>$url,
    ]);


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
