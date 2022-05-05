<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;
use Livewire\WithPagination;
use App\Models\MatriculacionPropuesta;

class MatriculacionPropuestaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat,$file;
    public $propuesta_id;
    public $academic_id;

    public function render()
    {
        $academic= Academic::all();
        $propuesta= Propuesta::all();

        $matriculacion = MatriculacionPropuesta::whereIn('status',[1,2,3])
        ->propuesta($this->propuesta_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);


        return view('livewire.admin.matriculacion-propuesta-index',compact('matriculacion','academic','propuesta'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=MatriculacionPropuesta::find($id);

        return response()->download(
            storage_path('app/public/matriculaciones/') . $this->mat->resource->name
        );
    }
        public function status(MatriculacionPropuesta $mat){

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
