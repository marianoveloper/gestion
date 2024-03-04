<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;


Route::get('/', function () {
    return view('sala.candidato.index');
})->name('dashboard');

Route::resource('candidato',CandidatoController::class)->names('candidato');
