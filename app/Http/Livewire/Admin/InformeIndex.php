<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Informe;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;

class InformeIndex extends Component
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


          $matriculacion = Informe::whereIn('status',[1,2,3,4])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);

        $academic= Academic::all();
        $carrera= Carrera::all();
        return view('livewire.admin.informe-index',compact('matriculacion','academic','carrera'));
    }

    public function status(Informe $mat){

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
