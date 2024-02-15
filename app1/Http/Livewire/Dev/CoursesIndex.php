<?php

namespace App\Http\Livewire\Dev;

use App\Models\Course;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CoursesIndex extends Component
{
    use WithPagination;
    //protected $paginationTheme='bootstrap';
    public $search;

    public function render()
    {

            // ->where('user_id',auth()->user()->id)

            if(Auth::user()->id<5){

                $courses = Course::where('title','LIKE','%' . $this->search . '%')

                ->latest('id')

                ->paginate(8);

            }else{
                $courses = Course::where('title','LIKE','%' . $this->search . '%')
                ->where('user_id',auth()->user()->id)
                ->latest('id')

                ->paginate(8);
            }



        return view('livewire.dev.courses-index',compact('courses'));
    }


    public function limpiar_page(){

        $this->reset('page');
    }
}
