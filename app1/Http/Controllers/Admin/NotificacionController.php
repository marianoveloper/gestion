<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificacionController extends Controller
{
    public function index()
    {

        $matriculacion=Notificacion::all();
        return view('admin.notificacion.index',compact('matriculacion'));
    }
}
