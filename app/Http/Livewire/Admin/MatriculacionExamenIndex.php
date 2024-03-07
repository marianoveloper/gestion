<?php

namespace App\Http\Livewire\Admin;
use App\Models\Carrera;
use App\Models\Materia;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;
use App\Models\MatriculacionExamen;



class MatriculacionExamenIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat,$file;
    public $carrera_id;
    public $academic_id;

    public $carreras;
    public $materias;
    public $carreraFilter;
    public $materiaFilter;
    public $searchFilter;

    public function mount(){
        $this->carreras=Carrera::all();
       $this->materias=Materia::all();

    }


    public function render()
    {



        $matriculacion= MatriculacionExamen::query()
           ->when($this->carreraFilter, function ($query) {
               $query->where('carrera_id', $this->carreraFilter);})
            ->when($this->materiaFilter, function ($query) {
            $query->where('materia_id', $this->materiaFilter);})
            ->when($this->searchFilter, function ($query) {
                $query->where('carrera_id', 'like', '%'.$this->searchFilter.'%');
           })
           ->with('carrera','materia')->latest('id')->paginate(16);  //Esto es para que se vean los datos en la tabla


return view('livewire.admin.matriculacion-examen-index',compact('matriculacion'));

/*
        $academic= Academic::all();
        $carrera= Carrera::all();

        $matriculacion = MatriculacionExamen::whereIn('status',[1,2,3,4])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);




       return view('livewire.admin.matriculacion-examen-index',compact('matriculacion','academic','carrera'));*/
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=MatriculacionExamen::find($id);

        return response()->download(
            storage_path('app/public/matriculaciones/') . $this->mat->resource->name
        );
    }
        public function status(MatriculacionExamen $mat){

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

        public function listarmateria($carrera_id){

            $this->materias=Materia::where("carrera_id",$carrera_id)->get();
        }
}

