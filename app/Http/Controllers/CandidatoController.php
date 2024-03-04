<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CandidatoController extends Controller
{
    private $token='37192c673d94f5d041a2ce9619202686';
    private $domainname='https://pre-virtual.uccuyo.edu.ar';
    private $pass='Passwor*123';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /*$users = Candidato::all();
         return view('sala.candidato.index', compact('users'));*/

         return view('sala.candidato.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sala.candidato.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
         'email' => 'required',
            'dni' => 'required',

        ]);

        //crear usuario moodle

        $functionname= 'core_user_create_users';

        $serverurl= $this->domainname . '/webservice/rest/server.php'
        . '?wstoken='. $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&users[0][username]='.$request->input('dni')
        .'&users[0][password]='. $this->pass
        .'&users[0][firstname]='.$request->input('name')
        .'&users[0][lastname]='.$request->input('last_name')
        .'&users[0][email]='.$request->input('email')
        .'&users[0][idnumber]='.$request->input('dni')
        .'&users[0][auth]='.'manual'
        .'&users[0][lang]='.'es';
        $usuario=Http::get($serverurl);
//dd($usuario);
        foreach(json_decode($usuario) as $usu){

        }
    $num=$usu->id;
  //  dd($usu->id);
        //crear el usuario en la base de datos
        $n_use=new Candidato();
        $n_use->name=$request->input('name');
        $n_use->last_name=$request->input('last_name');
        $n_use->email=$request->input('email');
        $n_use->dni=$request->input('dni');
        $n_use->id_user_moodle=$num;
        $n_use->password=bcrypt($request->input('input'));
        $n_use->save();

        //retornar a la vista
        return redirect()->route('sala.candidato.index')->with('info', 'Candidato creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidato $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidato $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidato $user)
    {
        //
    }

    public function consulta(Request $request){
        $username=$request->input('username');
        $functionname= 'core_user_get_users';
        $serverurl= $this->domainname . '/webservice/rest/server.php'
        . '?wstoken='. $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&criteria[0][key]=username&criteria[0][value]='.$username;
        $usuario=Http::get($serverurl);
//dd($usuario);
        return view('plantilla.index', compact('usuario'));
    }

    public function consultarmatricula(Grado $grado){
        //consultar usuarios que no estan matriculados en el curso
        $users=User::WhereNotExists(function ($query) use($grado){
            $query->select()
            ->from('grado_user')
            ->whereColumn('grado_user.user_id','users_id')
            ->where('grado_user.grado_id',$grado->id);
        })->get();
       return view('grado.consultarmatricula',compact('grado','users'));
    }

    public function matricular(Request $request){

        $user=User::find($request->input('user_id'));

        //matricular en el sistema
        $grado->users()->attach($user->id);
        $functionname2= 'enrol_manual_enrol_users';

        $consulta= $this->domainname . '/webservice/rest/server.php'
        . '?wstoken='. $this->token
        . '&wsfunction='.$functionname2
        .'&moodlewsrestformat=json'
        .'&enrolments[0][roleid]=10'
        .'&enrolments[0][userid]='.$user->id_user_moodle
        .'&enrolments[0][courseid]='.$area->id_curso_moodle
        . '&enrolments[0][timestart]='.time()+86400
        . '&enrolments[0][timeend]=0';
        $usuario=Http::get($consulta);



        return redirect()->route('sala.candidato.index')->with('info', 'Candidato matriculado exitosamente');
    }

    public function desmatricular(Candidato $user){
        $user->grados()->detach($grado->id);
        $functionname= 'enrol_manual_unenrol_users';
        $serverurl= $this->domainname . '/webservice/rest/server.php'
        . '?wstoken='. $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&enrolments[0][roleid]=5&enrolments[0][userid]='.$user->id
        .'&enrolments[0][courseid]='.$grado->id_curso;
        $usuario=Http::get($serverurl);

        return redirect()->route('grado.comsultarmatricula',$grado->id)->with('success', 'Usuario desmatriculado exitosamente');
    }
}
