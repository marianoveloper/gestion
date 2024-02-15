<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use App\Models\AulaComun;
use Livewire\WithPagination;

class AulaComunIndex extends Component
{
    use WithPagination;


    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat,$file;
    public $carrera_id;
    public $academic_id;

    public function render()
    {


        $aulacomun = AulaComun::whereIn('status',[1,2,3,4])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);

        $academic= Academic::all();
        $carrera= Carrera::all();
        return view('livewire.admin.aula-comun-index',compact('aulacomun','academic','carrera'));
    }
    public function limpiar_page(){
        $this->reset('page');
    }
    public function download($id) {

        $this->mat=AulaComun::find($id);

        return response()->download(
            storage_path('app/public/aulacomun/') . $this->mat->resource->name
        );
    }
    public function status(AulaComun $mat){

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
