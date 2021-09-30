<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Type;
class HomeController extends Controller
{


    public function __invoke()
    {
        $courses=Course::where('status',3)
        ->whereIn('status_course',[1,3])
        ->latest('id')->get()->take(8);
        $types= Type::all();
        $category=Category::all();
       //dd($types[0]->name);


        return view('welcome',compact('courses','types','category'));
    }
}
