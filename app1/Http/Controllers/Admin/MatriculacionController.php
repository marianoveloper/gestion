<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Matriculacion;
use App\Http\Controllers\Controller;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $matriculacion=Matriculacion::all();
        return view('admin.matriculacion.index',compact('matriculacion'));
    }

    public function update(Request $request, Matriculacion $matriculacion)
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
