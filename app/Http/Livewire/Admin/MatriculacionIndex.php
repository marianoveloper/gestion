<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Materia;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;

use App\Models\Matriculacion;
use Illuminate\Support\Facades\DB;


class MatriculacionIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $carreras;
    public $materias;
    public $carreraFilter;
    public $materiaFilter;
    public $searchFilter;

    /*public $bpaginacion=16;
    public $buscar;
    public $escarrera='like';
    public $ebcarrera= '%%';
    public $modal=0;
    public $mat,$file;
    public $carrera_id;
    public $academic_id;
    public $numero;*/

public function mount(){
    $this->carreras=Carrera::all();
   $this->materias=Materia::all();

}

    public function render()
    {


        $matriculacion= Matriculacion::query()
           ->when($this->carreraFilter, function ($query) {
               $query->where('carrera_id', $this->carreraFilter);})
            ->when($this->materiaFilter, function ($query) {
            $query->where('materia_id', $this->materiaFilter);})
            ->when($this->searchFilter, function ($query) {
                $query->where('carrera_id', 'like', '%'.$this->searchFilter.'%');
           })
           ->with('carrera','materia')->latest('id')->paginate(16);  //Esto es para que se vean los datos en la tabla


return view('livewire.admin.matriculacion-index',compact('matriculacion'));

           /*


        //buscar carrera
        if($this->ebcarrera=='%%'){
            $this->ebcarrera='%%';
            $this->escarrera='like';
        }
        else{$this->escarrera= '=';}

        //buscar paginacion
        if($this->bpaginacion=='all'){
            $numero=Matriculacion::all()->latest('id')->count();

        }
        else{
            $numero=$this->bpaginacion;
        }

        $matriculacion=Matriculacion::whereExists(function ($query){

            $query->select()
                  ->from(DB::raw('carreras'))

                  ->whereColumn('carreras.id','matriculacions.carrera_id')

                  ->where('carreras.id',$this->escarrera,$this->ebcarrera);



        }) ->latest('id')->paginate($numero);




        $academic= Academic::all();
        $carrera= Carrera::all();

      /*  $matriculacion = Matriculacion::whereIn('status',[1,2,3])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);*/




       //return view('livewire.admin.matriculacion-index',compact('matriculacion','academic','carrera'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=Matriculacion::find($id);

        return response()->download(
            storage_path('app/public/matriculaciones/') . $this->mat->resource->name
        );
    }
        public function status(Matriculacion $mat){

            if($mat->status==1){
                $mat->status=2;
                $mat->status_name=auth()->user()->name;

                $mat->save();
            }elseif($mat->status==2){
                $mat->status=3;
                $mat->status_name=auth()->user()->name;
                $mat->save();
            }elseif($mat->status==3){
                $mat->status=4;
                $mat->status_name=auth()->user()->name;
                $mat->save();
            }
            else{

                $mat->status=1;
                $mat->status_name=null;
                $mat->save();
            }


        }

        public function modalInfo(){

            //$this->limpiarCampos();
            $this->abrirModal();
        }

        public function abrirModal(){
            $this->modal=true;

        }

        public function cerrarModal(){
            $this->modal=false;

        }

        public function listarmateria($carrera_id){

            $this->materias=Materia::where("carrera_id",$carrera_id)->get();
        }


}
