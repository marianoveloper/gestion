<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use App\Mail\Notificacion;
use App\Models\Desmatriculacion;
use Illuminate\Support\Facades\Mail;


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
            'desmatriculacion'=>Desmatriculacion::whereDate('created_at',Carbon::now()->format('Y-m-d'))
            ->where('user_id',auth()->user()->id)
            ->get(),
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

        $rules = $this->rules;

        $this->validate($rules);

        $desmat= new Desmatriculacion();

        $desmat->name=$this->name;
        $desmat->dni=$this->dni;
        $desmat->email=$this->email;
        $desmat->user_id=auth()->user()->id;
        $desmat->academic_id=$this->academic_id;
        $desmat->carrera_id=$this->carrera_id;

        $desmat->save();


        session()->flash('message','info'?
        '¡Actualización exitosa!' : '¡Alta Exitosa!');

    $this->enviarMail($desmat);
     $this->cerrarModal();
     $this->limpiarCampos();
    }

    public function listarcarrera($academic_id){

        $this->carrera=Carrera::where("academic_id",$academic_id)->get();
    }

    public function enviarMail(Desmatriculacion $desmat){

        $correo=auth()->user()->email;
        $subject="Desmatriculación ".$desmat->academic->name;

        $mail=new Notificacion($subject,$correo);


         Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);

         return redirect()->route('desmatriculacion.index',$desmat)
         ->with('info','La Desmatriculación fue enviada');
    }

}
