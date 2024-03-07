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



    public $searchFilter;
    public $usuarios;
    public $propuestas;
    public $usuarioFilter;
    public $propuestaFilter;

    public function mount(){
        $this->usuarios=User::all();
        $this->propuestas=Propuesta::all();

    }



        public function render()
        {


            $matriculacion= MatriculacionPropuesta::query()
               ->when($this->usuarioFilter, function ($query) {
                   $query->where('user_id', $this->usuarioFilter);})
                ->when($this->propuestaFilter, function ($query) {
                $query->where('propuesta_id', $this->propuestaFilter);})
                ->when($this->searchFilter, function ($query) {
                    $query->where('propuesta_id', 'like', '%'.$this->searchFilter.'%');
               })
               ->with('user','propuesta')->latest('id')->paginate(16);  //Esto es para que se vean los datos en la tabla


    return view('livewire.admin.matriculacion-propuesta-index',compact('matriculacion'));

            /*buscar propuesta
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
        ->paginate(16);



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


        return view('livewire.admin.matriculacion-propuesta-index',compact('matriculacion','academic','propuesta','usuario'));*/
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

        public function listarpropuesta(){

            $this->propuestas=Propuesta::all()->get();
        }

}
