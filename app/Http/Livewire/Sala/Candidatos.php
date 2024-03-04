<?php

namespace App\Http\Livewire\Sala;

use Livewire\Component;
use App\Models\Candidato;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Candidatos extends Component
{
    use WithPagination;
    public function render()
    {

        $user=auth()->user();//$user->id


        $users=Candidato::all();

        return view('livewire.sala.candidatos',compact('users'));
    }

    public function matricular($candidato_id){


        
       
        $user=Candidato::find($candidato_id);

        //matricular en el sistema
      
        $functionname2= 'enrol_manual_enrol_users';

        $consulta='https://pre-virtual.uccuyo.edu.ar/webservice/rest/server.php'
        . '?wstoken=37192c673d94f5d041a2ce9619202686'
        . '&wsfunction=enrol_manual_enrol_users'
        .'&moodlewsrestformat=json'
        .'&enrolments[0][roleid]=10'
        .'&enrolments[0][userid]='.$user->id_user_moodle
        .'&enrolments[0][courseid]=15'
        . '&enrolments[0][timestart]='.time()+86400
        . '&enrolments[0][timeend]=0';
        $usuario=Http::get($consulta);
        $user->matriculacion_status=true;
        $user->curso_id='15';
        $user->save();
       

        return redirect()->route('sala.candidato.index')->with('info', 'Candidato matriculado exitosamente');
    }

    public function desmatricular($candidato_id){
       
        $user=Candidato::find($candidato_id);

        $functionname= 'enrol_manual_unenrol_users';
        $consulta='https://pre-virtual.uccuyo.edu.ar/webservice/rest/server.php'
        . '?wstoken=37192c673d94f5d041a2ce9619202686'
        . '&wsfunction=enrol_manual_unenrol_users'
        .'&moodlewsrestformat=json'        
        .'&enrolments[0][userid]='.$user->id
        .'&enrolments[0][courseid]=15'
        .'&enrolments[0][roleid]=10';
        $usuario=Http::get($consulta);
        /*$user->matriculacion_status=false;
        $user->curso_id=null;
        $user->save();*/
        return redirect()->route('sala.candidato.index')->with('info', 'Usuario desmatriculado exitosamente');
    }

}
