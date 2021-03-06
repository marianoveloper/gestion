<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Consulta;
use Illuminate\Support\Facades\Mail;

class ConsultaController extends Controller
{

    public function index(){
        return view('consulta.index');
    }

    public function store(Request $request){
        $mail=auth()->user()->email;
        $correo = new Consulta($request->all());
        Mail::to($mail)->send($correo);

        return redirect()->route('consulta.index')->with('info', 'Su consulta ha sido enviada con exito.');
    }

    public function show(){
        return;
    }

}
