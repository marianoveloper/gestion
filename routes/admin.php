<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\CatedraController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MatriculacionController;
use App\Models\Matriculacion;

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

