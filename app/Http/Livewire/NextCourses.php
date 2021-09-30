<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class NextCourses extends Component
{
    public function render()
    {

        $courses = Course::where('status', 3)
        ->where('status_course',2)
        ->latest('id')
        ->paginate(8);
        return view('livewire.next-courses',compact('courses'));
    }
}
