<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;
use App\Models\Matriculacion;


class MatriculacionIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat,$file;

    public function render()
    {
        $academic= Academic::all();
        $carrera= Carrera::all();

        $matriculacion = Matriculacion::all();


       return view('livewire.admin.matriculacion-index',compact('matriculacion','academic','carrera'));
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

    public function status($id){
$this->mat=Matriculacion::find($id);

        if($this->mat->status==1){
            $this->mat->status=2;
            $this->mat->save();

        }
        else{

            $this->mat->status=1;
            $this->mat->save();
        }

        return back();
    }

}
