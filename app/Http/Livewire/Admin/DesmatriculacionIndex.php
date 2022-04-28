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

    public $mat,$file;
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
        ->paginate(4);

        return view('livewire.admin.desmatriculacion-index',compact('desmatriculacion','academic','carrera'));
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
