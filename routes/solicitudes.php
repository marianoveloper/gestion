<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solicitudes\MatriculacionController;

Route::get('/', function () {
    return view('solicitudes.dashboard');
})->name('dashboard');


Route::resource('matriculacion',MatriculacionController::class)->only('index')->names('matriculacion');
