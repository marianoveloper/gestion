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
        $courses=Course::where('status',1)

        ->latest('id')->get()->take(8);
        $types= Type::all();
        $category=Category::all();


        return view('welcome',compact('courses','types','category'));
    }
}
