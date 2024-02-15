<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;
use Livewire\WithPagination;
use App\Models\DesmatriculacionPropuesta;

class DesmatriculacionPropuestaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $bpaginacion=16;
    public $buscar;
    public $escarrera='like';
    public $ebcarrera= '%%';
    public $modal=0;
    public $mat,$file;
    public $propuesta_id;
    public $academic_id;
    public $numero;

    public function render()
    {

            $desmatriculacion =DesmatriculacionPropuesta::whereIn('status',[1,2,3,4])
        ->propuesta($this->propuesta_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);

        $academic= Academic::all();
        $propuesta= Propuesta::all();
        return view('livewire.admin.desmatriculacion-propuesta-index',compact('desmatriculacion','academic','propuesta'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=DesmatriculacionPropuesta::find($id);

        return response()->download(
            storage_path('app/public/desmatriculacionesPropuesta/') . $this->mat->resource->name
        );
    }

    public function status(DesmatriculacionPropuesta $mat){

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
}
