<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Academic;
use App\Models\Propuesta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicas=Academic::pluck('name','id');
        $propuesta=Propuesta::pluck('name','id');
        return view("certificado.index",compact('academicas','propuesta'));
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

}
