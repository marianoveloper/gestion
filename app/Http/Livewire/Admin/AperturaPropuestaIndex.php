<?php

namespace App\Http\Livewire\Admin;


use App\Models\Sede;
use Livewire\Component;
use App\Models\Academic;


use App\Models\AperturaPropuesta;
use Illuminate\Support\Facades\DB;

class AperturaPropuestaIndex extends Component
{
    protected $paginationTheme ="bootstrap";

    public $search;

    public $car,$file,$down;

    public function render()
    {
        $academic= Academic::all();
        $sede=Sede::all();
        $propuesta=AperturaPropuesta::all();


        return view('livewire.admin.apertura-propuesta-index',compact('academic','sede','propuesta'));
    }

    public function download($id) {

        $this->car=AperturaPropuesta::find($id);

        return response()->download(
            storage_path('app/public/propuesta/') . $this->car->resource->name
        );
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

       public function descargaCv($id){

        $this->car=DB::table('resources')->where('resourceable_id',$id)->where('resourceable_type',"App\Models\AperturaPropuesta")->get();
      // dd($this->car);

       foreach($this->car as $item){
        if($item->url=="cvpuccv/".$item->name)
            $this->down=$item->name;
       }
        return response()->download(
            storage_path('app/public/cvpuccv/') .$this->down
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
