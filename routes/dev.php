<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DevCourses;
use App\Http\Controllers\Dev\CourseController;
use App\Http\Livewire\Dev\CoursesCurriculum;
use App\Http\Livewire\Dev\CoursesGoals;

Route::redirect('', 'dev/courses');


Route::resource('courses', CourseController::class)->names('courses');

//Route::get('courses', DevCourses::class)->middleware('can:Leer cursos')->name('courses.index');

//Route::get('courses/{course}/curriculum', function($id){})->name('courses.curriculum');
Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');



Route::post('courses/{course}/status',[CourseController::class,'status'])->name('courses.status');
