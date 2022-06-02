<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Carrera;
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
    public $name,$dni,$email,$carrera_id,$academic_id,$user_id,$file;
    public $carrera="";
    public $modal=0;
    public $modal2=0;

    protected $rules =[

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
    public function desmatricular2(){

        $this->limpiarCampos();
        $this->abrirModal2();
    }

    public function abrirModal2(){
        $this->modal2=true;

    }

    public function cerrarModal2(){
        $this->modal2=false;

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

    public function save(){

        $rules2 = $this->rules2;

        $this->validate($rules2);

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
        $academic=$matriculacion->academic->name;

        $subject="Desmatriculación ".$desmat->academic->name;

        $mail=new EmailNotification($subject,$correo,$academic);
       //$mail=new Notificacion($subject,$correo,$academic);
        $confirmation=new EmailConfirmation($subject,$correo,$academic);

        Mail::to('soportevirtual@uccuyo.edu.ar')->send($mail);
        Mail::to($correo)->send($confirmation);


         return redirect()->route('desmatriculacion.index',$desmat)
         ->with('info','La Desmatriculación fue enviada');
    }

}
