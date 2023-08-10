<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solicitudes\PropuestaController;
use App\Http\Controllers\Solicitudes\MatriculacionController;
use App\Http\Controllers\Solicitudes\DesmatriculacionController;

Route::get('/', function () {
    return view('solicitudes.dashboard');
})->name('dashboard');


Route::resource('matriculacion',MatriculacionController::class)->only('index')->names('matriculacion');

Route::resource('propuesta',PropuestaController::class)->only('index')->names('propuesta');

Route::resource('desmatriculacion',DesmatriculacionController::class)->only('index')->names('desmatriculacion');
