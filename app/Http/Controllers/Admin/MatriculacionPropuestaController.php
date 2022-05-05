<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MatriculacionPropuesta;
use Illuminate\Http\Request;

class MatriculacionPropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $matriculacion=MatriculacionPropuesta::all();

        return view('admin.propuesta.matriculacion.index',compact('matriculacion'));
    }

    public function update(Request $request, MatriculacionPropuesta $matriculacion)
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



        $matriculacion->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
