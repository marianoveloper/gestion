<?php

namespace App\Http\Livewire\Solicitudes;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;
use Livewire\WithPagination;
use App\Models\MatriculacionPropuesta;

class SoliPropuesta extends Component
{
    use WithPagination;


    public $search;

    public $mat,$file;
    public $propuesta_id;
    public $academic_id;

    public function render()
    {

        $user=auth()->user();
        $academic= Academic::find($user->academic_id);
        $propuesta= Propuesta::all();

        //dd($academic->name);

       // $user->id $user->academic_id

        $matriculacion = MatriculacionPropuesta::where('user_id',$user->id)
        ->propuesta($this->propuesta_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);



        return view('livewire.solicitudes.soli-propuesta',compact('matriculacion','academic','propuesta'));
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
}
