<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Materia;
use Livewire\Component;
use App\Models\Academic;

class MatriculacionExamen extends Component
{
    public $carreras="";
    public $materias="";

    public function render()
    {
        return view('livewire.matriculacion-examen',[
            "academicas"=>Academic::all(),
            "carreras"=>$this->carreras,
             "materias"=>$this->materias
            ]);
    }

    public function listarcarrera($academic_id){

        $this->carreras=Carrera::where("academic_id",$academic_id)->get();
    }

    public function listarmateria($carrera_id){

        $this->materias=Materia::where("carrera_id",$carrera_id)->get();
    }
}
