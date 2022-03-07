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
}
