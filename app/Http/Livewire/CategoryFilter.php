<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Course;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;
    public $category,$subcategoria;
    public $view = "grid";

    public function render()
    {
        //$types= Type::all();
        $coursesQuery = Course::where('status', 1)

        ->category($this->category->id);


        /*$coursesQuery= Course::where('id',$this->category->id);

        $coursesQuery= Course::query()->whereHas('type.category',function(Builder $query){
            $query->where('id',$this->category->id);

        });*/

        if($this->subcategoria){

            $coursesQuery= $coursesQuery->whereHas('type',function(Builder $query){
                $query->where('name',$this->subcategoria);
            });
        }

        $courses=$coursesQuery->where('status',1)
       ->paginate(10);


        return view('livewire.category-filter',compact('courses'));
    }

  public function limpiar(){
        $this->reset(['subcategoria','page']);
    }


    public function updatedSubcategoria(){
        $this->resetPage();
    }
}
