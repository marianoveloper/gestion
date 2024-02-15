<?php

namespace App\Http\Livewire\Dev;

use App\Models\Course;
use App\Models\Resolution;
use Livewire\Component;

class CoursesResolutions extends Component
{

    public $course,$resolution,$name;

    protected $rules=[
        'resolution.name'=>'required',
    ];

    public function mount(Course $course){
        $this->course=$course;
        $this->resolution=new Resolution();
    }
    public function render()
    {
        return view('livewire.dev.courses-resolutions');
    }
    public function store(){

        $this->validate([
            'name'=> 'required',
        ]);

        $this->course->resolutions()->create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->course= Course::find($this->course->id);
    }

    public function edit(Resolution $resolution){
        $this->resolution=$resolution;
    }
    public function update(Resolution $resolution){
        $this->validate();
        $this->resolution->save();

        $this->resolution=new Resolution();

        $this->course= Course::find($this->course->id);
    }

    public function destroy(Resolution $resolution){

        $resolution->delete();
        $this->course= Course::find($this->course->id);
    }
}
