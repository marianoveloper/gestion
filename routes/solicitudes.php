<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('solicitudes.dashboard');
})->name('dashboard');
