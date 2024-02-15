<?php

namespace App\Http\Livewire\Solicitudes;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;
use App\Models\MatriculacionExamen;

class SoliExamen extends Component
{
    use WithPagination;
    public $carrera_id;
    public $academic_id;

    public function render()
    {
        $user=auth()->user();

        $matriculacion = MatriculacionExamen::where('user_id',$user->id)
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);

        $academic= Academic::all();
        $carrera= Carrera::all();

        return view('livewire.solicitudes.soli-examen',compact('matriculacion','academic','carrera'));
    }

    public function download($id) {

        $this->mat=MatriculacionExamen::find($id);

        return response()->download(
            storage_path('app/public/matriculaciones/') . $this->mat->resource->name
        );
    }
}
