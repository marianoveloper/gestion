<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;
use Livewire\WithPagination;
use App\Models\Matriculacion;
use Illuminate\Support\Facades\DB;
use App\Models\MatriculacionPropuesta;

class MatriculacionPropuestaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme ="bootstrap";

    public $search;

    public $mat,$file;
    public $propuesta_id;
    public $academic_id;
 public $user_id;
    public $bpaginacion=16;
    public $buscar;
    public $espropuesta='like';
    public $ebpropuesta= '%%';
    public $esusuario='like';
    public $ebusuario= '%%';
    public $modal=0;

    public $numero;


    public function render()
    {

            //buscar propuesta
            if($this->ebpropuesta=='%%'){
                $this->ebpropuesta='%%';
                $this->espropuesta='like';
            }
            else{$this->espropuesta= '=';}

             //buscar usuario
             if($this->ebusuario=='%%'){
                $this->ebusuario='%%';
                $this->esusuario='like';
            }
            else{$this->esusuario= '=';}


             //buscar paginacion
        if($this->bpaginacion=='all'){
            $numero=MatriculacionPropuesta::all()->latest('id')->count();

        }
        else{
            $numero=$this->bpaginacion;
        }

        $academic= Academic::all();
        $propuesta= Propuesta::all();
        $usuario=User::all();
       /* $matriculacion = MatriculacionPropuesta::whereIn('status',[1,2,3])
        ->propuesta($this->propuesta_id)
        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);*/



        $matriculacion=MatriculacionPropuesta::whereExists(function ($query){

            $query->select()
                  ->from(DB::raw('propuestas'))

                  ->whereColumn('propuestas.id','matriculacion_propuestas.propuesta_id')

                  ->where('propuestas.id',$this->espropuesta,$this->ebpropuesta);



        }) ->latest('id')->paginate($numero);

        $matriculacion=MatriculacionPropuesta::whereExists(function ($query){

            $query->select()
                  ->from(DB::raw('users'))

                  ->whereColumn('users.id','matriculacion_propuestas.user_id')

                  ->where('users.id',$this->esusuario,$this->ebusuario);



        }) ->latest('id')->paginate($numero);


        return view('livewire.admin.matriculacion-propuesta-index',compact('matriculacion','academic','propuesta','usuario'));
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
        public function status(MatriculacionPropuesta $mat){

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
