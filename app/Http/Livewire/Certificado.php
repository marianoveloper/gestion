<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;

class Certificado extends Component
{

    public $propuestas="";

    public function render()
    {

        return view('livewire.certificado',[
            "academicas"=>Academic::all(),
            "propuestas"=>""

            ]);
    }

    public function listarunidades($academic_id){

        $this->academicas=Academic::where("academic_id",$academic_id)->get();
    }

    public function listarpropuesta($propuesta_id){

        $this->propuestas=Propuesta::where("propuesta_id",$propuesta_id)->get();
    }
}