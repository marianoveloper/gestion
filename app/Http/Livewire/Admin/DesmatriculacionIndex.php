<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;
use App\Models\Desmatriculacion;

class DesmatriculacionIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat;
    public $carrera_id;
    public $academic_id;

    public function render()
    {
        $academic= Academic::all();
        $carrera= Carrera::all();


        $desmatriculacion = Desmatriculacion::whereIn('status',[1,2,3])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(10);


        return view('livewire.admin.desmatriculacion-index',compact('desmatriculacion','academic','carrera'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {
dd("llego");
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
