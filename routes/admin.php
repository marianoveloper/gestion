<?php

use App\Models\Matriculacion;
use App\Models\Desmatriculacion;
use Illuminate\Support\Facades\Route;
use App\Models\MatriculacionPropuesta;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\CatedraController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExamenAulaController;
use App\Http\Controllers\Admin\MatriculacionController;
use App\Http\Controllers\Admin\DesmatriculacionController;
use App\Http\Controllers\Admin\AperturaPropuestaController;
use App\Http\Controllers\Admin\MatriculacionExamenController;
use App\Http\Controllers\Admin\MatriculacionPropuestaController;

Route::get('',[HomeController::class,'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only('index','edit','update')->names('users');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('types', TypeController::class)->names('types');

Route::get('courses',[CourseController::class,'index'])->name('course.index');

Route::get('courses/{course}',[CourseController::class,'show'])->name('course.show');

Route::post('course/{course}/approve',[CourseController::class,'aproved'])->name('course.aproved');

Route::resource('matriculacion',MatriculacionController::class)->only('index','store','update')->names('matriculacion');


Route::put('matriculacion/status/{mat}',[Matriculacion::class,'status'])->name('matriculacion.status');

Route::resource('catedra',CatedraController::class)->names('catedra');

Route::resource('carrera',CarreraController::class)->names('carrera');

Route::resource('desmatriculacion',DesmatriculacionController::class)->only('index','update')->names('desmatriculacion');


Route::put('desmatriculacion/status/{desmat}',[DesmatriculacionController::class,'status'])->name('desmatriculacion.status');

Route::resource('matriculacionpropuesta',MatriculacionPropuestaController::class)->only('index','store','update')->names('matriculacion-propuesta');

Route::resource('aperturapropuesta',AperturaPropuestaController::class)->names('apertura-propuesta');

Route::put('matriculacion/status/{mat}',[MatriculacionPropuesta::class,'status'])->name('matriculacion.status');

Route::resource('matriculacionexamen',MatriculacionExamenController::class)->only('index','store','update')->names('matriculacion-examen');

Route::put('matriculacionexamen/status/{mat}',[MatriculacionExamen::class,'status'])->name('matriculacion.status');

Route::resource('examenaula',ExamenAulaController::class)->only('index','store','update')->names('examen-aula');

Route::put('examenaula/status/{mat}',[ExamenAula::class,'status'])->name('examen-aula.status');
