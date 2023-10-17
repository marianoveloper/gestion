<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;


// //Rutas para el controlador de usuarios
// Route::get('/panel', function () {
//     return view('panel');
// })->name('panel');

// Route::get('/adminpanel', function () {
//     return view('adminpanel');
// })->name('adminpanel');


Route::resource('panel', PanelController::class)->names('panel');
