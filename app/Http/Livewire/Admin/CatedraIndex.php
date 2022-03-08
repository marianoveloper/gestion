<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Catedra;
use Livewire\Component;
use App\Models\Academic;
use Livewire\WithPagination;

class CatedraIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $cat,$file;

    public function render()
    {
        $academic= Academic::all();
        $carrera= Carrera::all();

        $catedra=Catedra::all();

        return view('livewire.admin.catedra-index',compact('catedra','academic','carrera'));
    }

    public function download($id) {

        $this->cat=Catedra::find($id);

        return response()->download(
            storage_path('app/public/catedra/') . $this->cat->resource->name
        );
    }
}
