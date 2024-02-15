<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;

class Catedra extends Component
{
    public $carreras="";
    public function render()
    {

        return view('livewire.catedra',[
            "academicas"=>Academic::all(),
            "carreras"=>$this->carreras,

            ]);


    }

    public function listarcarrera($academic_id){

        $this->carreras=Carrera::where("academic_id",$academic_id)->get();
    }
}
