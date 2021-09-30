<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){

        $courses=Course::where('status',2)->paginate();

        return view('admin.course.index',compact('courses'));
    }

    public function show(Course $course){

       // $this->autorize('revision',$course);

        return view('admin.course.show',compact('course'));
    }

    public function aproved(Course $course){

        if(!$course->goals || !$course->requirements || !$course->image && $course->status_course == 1 ){

            return back()->with('info','No se puede publicar un curso que no este completo');
        }
        elseif($course->status_course==2 && !$course->image){
            return back()->with('info','Es necesario subir como minimo una imagen');
        }

        $course->status=3;
        $course->save();
        return redirect()->route('admin.course.index')->with('info','la propuesta se creo correctamente');
    }
}
