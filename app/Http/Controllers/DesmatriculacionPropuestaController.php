<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Propuesta;
use Illuminate\Http\Request;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\DesmatriculacionPropuesta;

class DesmatriculacionPropuestaController extends Controller
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
       return view('propuesta.desmatriculacion.index',compact('academica'));
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
                    'propuesta_id'=>'required',
                    'tipo'=>'required',

           ]);

           $matriculacion=DesmatriculacionPropuesta::create($request->all());

          // dd($matriculacion);
           if($request->file('file')){
            $name=$request->file('file')->getClientOriginalName();
            //$url=Storage::put('matriculaciones', $request->file('file'));
            $url=Storage::putFileAs('desmatriculacionesPropuesta',$request->file('file'),$name);
            //$name=$request->file('file')->hashName();

            $matriculacion->resource()->create([
                'url'=>$url,
                'name'=>$name,
            ]);

        }







        $correo=auth()->user()->email;
        $academic=$matriculacion->academic->name;

        $subject="Desmatriculación de ".$matriculacion->propuesta->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo,$academic);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);

        return redirect()->route('desmatriculacion-propuestas.index',$matriculacion)
        ->with('info','La solicitud fue enviado');

    }
}
