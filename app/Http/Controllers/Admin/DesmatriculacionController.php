<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Desmatriculacion;
use App\Http\Controllers\Controller;

class DesmatriculacionController extends Controller
{
    public function index()
    {

        $desmatriculacion=Desmatriculacion::all();
        return view('admin.desmatriculacion.index',compact('desmatriculacion'));
    }

    public function update(Request $request, Desmatriculacion $desmatriculacion)
    {
        //dd($request->status);
        if($request->status==1){

            $request->status=2;

        }elseif($request->status==2){
            $request->status=3;
        }
        else{

            $request->status=1;
        }



        $desmatriculacion->update($request->all());

        return back();
    }
}
