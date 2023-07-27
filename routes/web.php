<?php

use App\Mail\Consulta;
use App\Models\Desmatriculacion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\CatedraController;
use App\Http\Controllers\AperturaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AulaComunController;
use App\Http\Controllers\PropuestaController;
use App\Http\Controllers\ExamenAulaController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\MatriculacionController;
use App\Http\Controllers\DesmatriculacionController;
use App\Http\Controllers\AperturaPropuestaController;
use App\Http\Controllers\MatriculacionExamenController;
use App\Http\Controllers\MatriculacionPropuestasController;

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

Route::get('catedra', [CatedraController::class, 'index'])->name('catedra.index');
Route::post('catedra', [CatedraController::class, 'store'])->name('catedra.store');

Route::get('apertura', [AperturaController::class, 'index'])->name('carrera.index');
Route::post('apertura', [AperturaController::class, 'store'])->name('carrera.store');

Route::get('propuesta',[AperturaPropuestaController::class,'index'])->name('propuesta.index');
Route::post('propuesta',[AperturaPropuestaController::class,'store'])->name('propuesta.store');

Route::get('desmatriculacion',[DesmatriculacionController::class,'index'])->name('desmatriculacion.index');

Route::resource('matriculacionpropuestas',MatriculacionPropuestasController::class)->only('index','store','update')->names('matriculacion-propuestas');

Route::get('examen',[ExamenController::class,'index'])->name('examen.index');
Route::get('examenaula',[ExamenAulaController::class,'index'])->name('examenaula.index');
Route::post('examenaula',[ExamenAulaController::class,'store'])->name('examenaula.store');

Route::get('matriculacionexamen',[MatriculacionExamenController::class,'index'])->name('matriculacionexamen.index');
Route::post('matriculacionexamen',[MatriculacionExamenController::class,'store'])->name('matriculacionexamen.store');


Route::get('aulacomun', [AulaComunController::class, 'index'])->name('aulacomun.index');
Route::post('aulacomun', [AulaComunController::class, 'store'])->name('aulacomun.store');

Route::get('certificado', [CertificadoController::class, 'index'])->name('certificado.index');
Route::post('certificado', [CertificadoController::class, 'store'])->name('certificado.store');
