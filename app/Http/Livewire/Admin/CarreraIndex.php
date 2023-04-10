<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sede;
use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use App\Models\Apertura;

class CarreraIndex extends Component
{

    protected $paginationTheme ="bootstrap";

    public $search;

    public $car,$file;

    public function render()
    {
        $academic= Academic::all();
      $sede=Sede::all();
        $carrera=Apertura::all();


        return view('livewire.admin.carrera-index',compact('sede','academic','carrera'));
    }

    public function download($id) {

        $this->car=Apertura::find($id);

        return response()->download(
            storage_path('app/public/carrera/') . $this->car->resource->name
        );
    }

    public function status(Carrera $mat){

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
