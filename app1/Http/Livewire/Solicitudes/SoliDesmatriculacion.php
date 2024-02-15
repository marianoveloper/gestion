<?php

namespace App\Http\Livewire\Solicitudes;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;
use App\Models\Desmatriculacion;

class SoliDesmatriculacion extends Component
{
    use WithPagination;
    public $carrera_id;
    public $academic_id;

    public function render()
    {

        $user=auth()->user();
        $academic= Academic::find($user->academic_id);

        $desmatriculacion = Desmatriculacion::where('user_id',$user->id)
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);


        $carrera= Carrera::all();
        return view('livewire.solicitudes.soli-desmatriculacion',compact('desmatriculacion','academic','carrera'));
    }

    public function download($id) {

        $this->mat=Desmatriculacion::find($id);

        return response()->download(
            storage_path('app/public/desmatriculaciones/') . $this->mat->resource->name
        );
    }
}
