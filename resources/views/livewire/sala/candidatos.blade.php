<div>
 <!-- Boton para crear un nuevo usuario -->
 
 <div class="text-center">
    @if (session('info'))
    <a href="/"
        class="items-center w-full px-4 py-3 text-sm font-bold text-center text-white bg-yellow-500 rounded hover:bg-yellow-700">{{session('info')}}!
       </a>
    @endif

</div>

<div class="container">
    <a href="{{route('sala.candidato.create')}}" class="btn btn-primary">Cargar Candidato</a>
</div>
@if ($users->count())
<div class="container mt-3">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Nombre y Apellido </th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Dni</th>
            <th scope="col" class="px-6 py-3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>

                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dni}}</td>

               
                <td>
                    @if($user->matriculacion_status==false)
                        <button wire:click="matricular({{ $user->id }})"class="px-4 py-2 my-3 font-bold text-white bg-yellow-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green">
                            Matricular
                         </button>
                    
                    @else
                        <button class="px-4 py-2 my-3 font-bold text-white bg-green-800 hover:bg-yellow-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green">
                            Matriculado
                         </button>
                    
                    @endif
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</div>
@else


<div class="card-body">
   <strong>No hay candidatos ingresados ....</strong>
</div>

@endif
</div>
</div>
