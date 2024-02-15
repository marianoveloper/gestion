<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use App\Models\ExamenAula;
use Livewire\WithPagination;

class ExamenAulaIndex extends Component
{

    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat,$file;
    public $carrera_id;
    public $academic_id;

    public function render()
    {
        $academic= Academic::all();
        $carrera= Carrera::all();

        $matriculacion = ExamenAula::whereIn('status',[1,2,3])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);

        return view('livewire.admin.examen-aula-index',compact('matriculacion','academic','carrera'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=ExamenAula::find($id);

        return response()->download(
            storage_path('app/public/matriculaciones/') . $this->mat->resource->name
        );
    }
    public function status(ExamenAula $mat){

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
