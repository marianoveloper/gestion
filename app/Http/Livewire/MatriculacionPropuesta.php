<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;

class MatriculacionPropuesta extends Component
{

    public $propuestas="";
    public function render()
    {
        return view('livewire.matriculacion-propuesta',[
            "academicas"=>Academic::all(),
            "propuestas"=>$this->propuestas,

            ]);
    }

    public function listarpropuesta($academic_id){

        $this->propuestas=Propuesta::where("academic_id",$academic_id)->get();
    }
}
