<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use app\mail\Consulta;
use Illuminate\Support\Facades\Mail;

Route::get('/', HomeController::class)->name('home');


Route::match(['get', 'post'], '/botman', [BotManController::class,'handle']);
//Route::match(['get', 'post'], '/botman', 'BotManController@handle');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('cursos',[CourseController::class,'index'])->name('courses.index');
Route::get('cursos/{course}',[CourseController::class,'show'])->name('courses.show');

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');

Route::get('contactanos', function () {

    $correo= new Consulta;

    Mail::to('soportevirtual@uccuyo.edu.ar')->send($correo);

    return "mensaje enviado";

});




