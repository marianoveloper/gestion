<?php
namespace App\Http\Controllers\Dev;

use App\Models\Type;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dev.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id');
        $types=Type::pluck('name','id');

        return view('dev.courses.create',compact('categories','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //reglas de validacion

        $request->validate([
            'title'=> 'required',
            'slug'=> 'required|unique:courses',
            'description'=> 'required',

            'link_form'=>['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],

            'category_id'=> 'required',
            'type_id'=> 'required',
            'file'=>'required|image',

            'status'=>'required',


        ]);

        $course=Course::create($request->all());

        if($request->file('file')){
            $url=Storage::put('courses', $request->file('file'));
        }

        $course->image()->create([
            'url'=>$url,
        ]);





      return redirect()->route('dev.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        return view('dev.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories=Category::pluck('name','id');
        $types=Type::pluck('name','id');


        return view('dev.courses.edit',compact('course','categories','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'=> 'required',

            'description'=> 'required',

            'url_info'=>['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],

            'category_id'=> 'required',
            'type_id'=> 'required',
            'file'=>'image',

            'status'=>'required',

        ]);
$course->update($request->all());





if($request->file('file')){
    $url=Storage::put('courses',$request->file('file'));

    if($course->image){
        Storage::delete($course->image->url);

        $course->image->update([
            'url'=>$url,
        ]);
    }else{
        $course->image()->create([
            'url'=>$url,
        ]);
    }
}

return redirect()->route('dev.courses.edit',$course);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course){

        return view('dev.courses.goals',compact('course'));
    }



    public function status(Course $course){


        $course->status=2;
        $course->save();

        return back();
    }
}
