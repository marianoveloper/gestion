<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Mail\Consulta;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MatriculacionController;
use Illuminate\Support\Facades\Mail;

Route::get('/', HomeController::class)->name('home');


//Route::match(['get', 'post'], '/botman', [BotManController::class,'handle']);
//Route::match(['get', 'post'], '/botman', 'BotManController@handle');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('cursos',[CourseController::class,'index'])->name('courses.index');
Route::get('cursos/{course}',[CourseController::class,'show'])->name('courses.show');

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');


Route::get('consulta', [ConsultaController::class, 'index'])->name('consulta.index');
Route::post('consulta', [ConsultaController::class, 'store'])->name('consulta.store');


Route::get('matriculacion', [MatriculacionController::class, 'index'])->name('matriculacion.index');
Route::post('matriculacion', [MatriculacionController::class, 'store'])->name('matriculacion.store');


