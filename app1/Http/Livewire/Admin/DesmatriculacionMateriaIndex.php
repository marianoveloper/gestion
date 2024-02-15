<?php

namespace App\Http\Livewire\Admin;


use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;
use App\Models\Desmatriculacion;
use Illuminate\Support\Facades\DB;

class DesmatriculacionMateriaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $bpaginacion=16;
    public $buscar;
    public $escarrera='like';
    public $ebcarrera= '%%';
    public $modal=0;
    public $mat,$file;
    public $carrera_id;
    public $academic_id;
    public $numero;

    public function render()
    {


        //buscar carrera
        if($this->ebcarrera=='%%'){
            $this->ebcarrera='%%';
            $this->escarrera='like';
        }
        else{$this->escarrera= '=';}

        $academic= Academic::all();
        $carrera= Carrera::all();



      //buscar paginacion
      if($this->bpaginacion=='all'){
        $numero=Desmatriculacion::all()->latest('id')->count();

    }
    else{
        $numero=$this->bpaginacion;
    }

    $matriculacion=Desmatriculacion::whereExists(function ($query){

        $query->select()
              ->from(DB::raw('carreras'))

              ->whereColumn('carreras.id','desmatriculacions.carrera_id')

              ->where('carreras.id',$this->escarrera,$this->ebcarrera);



    }) ->latest('id')->paginate($numero);


        return view('livewire.admin.desmatriculacion-materia-index',compact('desmatriculacion','academic','carrera'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=Desmatriculacion::find($id);

        return response()->download(
            storage_path('app/public/desmatriculaciones/') . $this->mat->resource->name
        );
    }
    public function status(Desmatriculacion $mat){

        if($mat->status==1){
            $mat->status=2;
            $mat->status_name=auth()->user()->name;
            $mat->save();
        }elseif($mat->status==2){
            $mat->status=3;
            $mat->status_name=auth()->user()->name;
            $mat->save();
        }
        else{

            $mat->status=1;
            $mat->status_name=null;
            $mat->save();
           }
    }

}
