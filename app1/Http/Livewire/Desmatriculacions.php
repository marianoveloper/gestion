<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Carrera;
use App\Models\Materia;
use Livewire\Component;
use App\Models\Academic;
use App\Mail\Notificacion;
use Livewire\WithFileUploads;
use App\Mail\EmailConfirmation;
use App\Mail\EmailNotification;
use App\Models\Desmatriculacion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class Desmatriculacions extends Component
{
    use WithFileUploads;
    public $name,$dni,$email,$carrera_id,$academic_id,$materia_id,$user_id,$file,$tipo;
    public $carrera="";
    public $materia="";
    public $modal=0;
    public $modal2=0;
    public $modal3=0;

    protected $rules =[

        'tipo'=>'required',
       'name'=>'required',
        'dni'=>'required',
        'email'=>'required',
        'carrera_id'=>'required',
        'academic_id'=>'required'

    ];
    protected $rules2 =[


         'file'=>'required|mimes:xls,xlsx|max:2048',
         'carrera_id'=>'required',
         'academic_id'=>'required'

     ];

     protected $rules3 =[
        'tipo'=>'required',
        'name'=>'required',
         'dni'=>'required',
         'email'=>'required',
         'carrera_id'=>'required',
         'academic_id'=>'required',
         'materia_id'=>'required',

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
            "materia"=>$this->materia,

        ]);
    }


    public function save(){

        $rules2 = $this->rules2;

        $this->validate($rules2);
        sleep(2);
        $desmat= new Desmatriculacion();

        $desmat->user_id=auth()->user()->id;
        $desmat->academic_id=$this->academic_id;
        $desmat->carrera_id=$this->carrera_id;

        $desmat->save();


        if($this->file){
            $name=$this->file->getClientOriginalName();

            $url=Storage::putFileAs('desmatriculaciones',$this->file,$name);


          }



        $desmat->resource()->create([
            'url'=>$url,
            'name'=>$name,
        ]);

        session()->flash('message','info'?
        '¡Actualización exitosa!' : '¡Alta Exitosa!');

    $this->enviarMail($desmat);
     $this->cerrarModal();


    }

    public function guardar(){

        $rules = $this->rules;

        $this->validate($rules);

        sleep(2);
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

    public function crear(){


        $rules3 = $this->rules3;

        $this->validate($rules3);


        sleep(2);
        $desmat= new Desmatriculacion();

        $desmat->tipo=$this->tipo;
        $desmat->name=$this->name;
        $desmat->dni=$this->dni;
        $desmat->email=$this->email;
        $desmat->user_id=auth()->user()->id;
        $desmat->academic_id=$this->academic_id;
        $desmat->carrera_id=$this->carrera_id;
        $desmat->materia_id=$this->materia_id;
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

    public function listarmateria($carrera_id){

        $this->materia=Materia::where("carrera_id",$carrera_id)->get();
    }

    public function enviarMail(Desmatriculacion $desmat){

        $correo=auth()->user()->email;
        $academic=$desmat->academic->name;

        $subject="Desmatriculación ".$desmat->academic->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo,$academic);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);


         return redirect()->route('desmatriculacion.index',$desmat)
         ->with('info','La Desmatriculación fue enviada');
    }

    public function desmatricular2(){

        $this->limpiarCampos();
        $this->abrirModal2();
    }
    public function desmatricular3(){

        $this->limpiarCampos();
        $this->abrirModal3();
    }

    public function abrirModal2(){
        $this->modal2=true;

    }

    public function cerrarModal2(){
        $this->modal2=false;

    }

    public function abrirModal3(){
        $this->modal3=true;

    }

    public function cerrarModal3(){
        $this->modal3=false;

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

}
