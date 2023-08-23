<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;

class DesmatriculacionPropuestas extends Component
{
    public $propuestas="";
    public $activo="";
    public function render()
    {

        return view('livewire.desmatriculacion-propuestas',[
            "academicas"=>Academic::all(),
            "propuestas"=>$this->propuestas,

            ]);
    }

    public function listarpropuesta($academic_id){

        $this->propuestas=Propuesta::where("academic_id",$academic_id)->get();
    }

    public function activo($propuesta_id){

       $activo=Propuesta::where("id",$propuesta_id)->where("status",1)->get();
        $activo2=$activo->toArray();
        //dd($activo2);

if($activo->count()){

//dd("no vacio");
    if($activo[0]["status"]==1){

        $this->emit('alert2','Las Matriculaciones de '. $activo[0]["name"]. ' se encuentran cerradas');
        $this->reset('propuestas');
    }
}
else{
    //dd("opcion 2");
}




    }
}
