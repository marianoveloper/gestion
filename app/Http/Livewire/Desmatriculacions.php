<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use App\Models\Desmatriculacion;


class Desmatriculacions extends Component
{
    public $name,$dni,$email,$carrera_id,$academic_id,$user_id;
    public $carrera="";
    public $modal=0;

    protected $rules =[

        'name'=>'required',
        'dni'=>'required',
        'email'=>'required',
        'carrera_id'=>'required',
        'academic_id'=>'required'

    ];

    public function render()
    {
        //$desmatriculacion=Desmatriculacion::all();
        return view('livewire.desmatriculacions',[
            'desmatriculacion'=>Desmatriculacion::all(),
            "academicas"=>Academic::all(),
            "carrera"=>$this->carrera,
        ]);
    }

    public function desmatricular(){

        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal=true;

    }

    public function cerrarModal(){
        $this->modal=false;

    }

    public function limpiarCampos(){

        $this->name="";
        $this->dni="";
        $this->email="";


    }
    public function guardar(){

        /*$rules = $this->rules;

        $this->validate($rules);*/

        $desmat= new Desmatriculacion();

        $desmat->name=$this->name;
        $desmat->dni=$this->dni;
        $desmat->email=$this->email;
        $desmat->user_id=$this->user_id;
        $desmat->academic_id=$this->academic_id;
        $desmat->carrera_id=$this->carrera_id;

        $desmat->save();


        session()->flash('message','info'?
        '¡Actualización exitosa!' : '¡Alta Exitosa!');

     $this->cerrarModal();
     $this->limpiarCampos();
    }

    public function listarcarrera($academic_id){

        $this->carrera=Carrera::where("academic_id",$academic_id)->get();
    }

}
