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
    public $carrera_id;
    public $academic_id;

    public function render()
    {
        $academic= Academic::all();
        $carrera= Carrera::all();



        $catedra=Catedra::whereIn('status',[1,2])
        ->carrera($this->carrera_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(4);

        return view('livewire.admin.catedra-index',compact('catedra','academic','carrera'));
    }

    public function download($id) {

        $this->cat=Catedra::find($id);

        return response()->download(
            storage_path('app/public/catedra/') . $this->cat->resource->name
        );
    }

    public function status(Catedra $mat){

        if($mat->status==1){
            $mat->status=2;

            $mat->save();
        }
        else{

            $mat->status=1;

            $mat->save();
        }


    }

}
