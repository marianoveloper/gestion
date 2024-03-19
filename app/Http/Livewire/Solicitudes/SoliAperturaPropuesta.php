<?php

namespace App\Http\Livewire\Solicitudes;

use Livewire\Component;
use App\Models\Academic;
use App\Models\Propuesta;
use Livewire\WithPagination;
use App\Models\AperturaPropuesta;
use Illuminate\Support\Facades\DB;

class SoliAperturaPropuesta extends Component
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
        $propuesta= AperturaPropuesta::all();

        //dd($academic->name);

       // $user->id $user->academic_id

        $propuestas = AperturaPropuesta::where('user_id',$user->id)

        ->academic($this->academic_id)
        ->latest('id')
        ->paginate(16);

        return view('livewire.solicitudes.soli-apertura-propuesta',compact('propuestas','academic','propuesta'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
    public function descargaDescripcion($id){

        $this->car=DB::table('resources')->where('resourceable_id',$id)->where('resourceable_type',"App\Models\AperturaPropuesta")->get();
      // dd($this->car);

       foreach($this->car as $item){
        if($item->url=="descripcionpuccv/".$item->name)
            $this->down=$item->name;
       }
        return response()->download(
            storage_path('app/public/descripcionpuccv/') .$this->down
        );
       }


    public function descargaPrograma($id){

        $this->car=DB::table('resources')->where('resourceable_id',$id)->where('resourceable_type',"App\Models\AperturaPropuesta")->get();
      // dd($this->car);

       foreach($this->car as $item){
        if($item->url=="programapuccv/".$item->name)
            $this->down=$item->name;
       }
        return response()->download(
            storage_path('app/public/programapuccv/') .$this->down
        );
       }

       public function descargaResolucion($id){

        $this->car=DB::table('resources')->where('resourceable_id',$id)->where('resourceable_type',"App\Models\AperturaPropuesta")->get();
      // dd($this->car);

       foreach($this->car as $item){
        if($item->url=="resolpuccv/".$item->name)
            $this->down=$item->name;
       }
        return response()->download(
            storage_path('app/public/resolpuccv/') .$this->down
        );
       }

       public function descargaUsuario($id){

        $this->car=DB::table('resources')->where('resourceable_id',$id)->where('resourceable_type',"App\Models\AperturaPropuesta")->get();
      // dd($this->car);

       foreach($this->car as $item){
        if($item->url=="usuariopuccv/".$item->name)
            $this->down=$item->name;
       }
        return response()->download(
            storage_path('app/public/usuariopuccv/') .$this->down
        );
       }

    public function status(AperturaPropuesta $mat){

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
