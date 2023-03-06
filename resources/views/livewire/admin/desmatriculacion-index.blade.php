<div>
    <div class="card">


        <div class="card-header">
           <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
        </div>

        @if ($desmatriculacion->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Rol</th>
                        <th>Unidad Académica</th>
                        <th>Carrera</th>
                        <th>Materia</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Email</th>
                        <th>Acciones</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($desmatriculacion as $desmat)

                    <tr>

                        <td>{{ \Carbon\Carbon::parse($desmat->created_at)->format('d/m/Y')}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @switch($desmat->tipo)
                            @case(1)
                            <span
                                class="badge badge-success">
                               Estudiante
                            </span>
                            @break
                            @case(2)
                            <span
                                class="badge badge-primary">
                                Profesor
                            </span>
                            @break
                            @case(3)
                            <span
                                class="badge badge-info">
                               Tutor
                            </span>
                            @break
                            @case(4)
                            <span
                                class="badge badge-info">
                                Asesor Pedagógico
                            </span>
                            @break
                            @case(5)
                            <span
                                class="badge badge-info">
                               Referente Virtual
                            </span>
                            @break
                            @case(6)
                            <span
                                class="badge badge-info">
                                Coordinador
                            </span>
                            @break
                            @case(7)
                            <span
                                class="badge badge-info">
                                Director
                            </span>
                            @break
                            @default

                            @endswitch


                        </td>

                        <td>{{$desmat->academic->name}}</td>
                        <td>{{$desmat->carrera->name}}</td>
                        @if(@isset($desmat->materia))
                        <td>{{$desmat->materia->name}}</td>

                      @else
                       <td> </td>
                      @endif
                        <td>{{$desmat->name}}</td>
                        <td>{{$desmat->dni}}</td>
                        <td>{{$desmat->email}}</td>



                        <td width="10px">
                            @if(isset($desmat->resource->id))
                            <button wire:click="download({{$desmat->id}})" class="btn btn-info">
                                <i class="fas fa-download"></i>
                            </button>
                            @else
                            <button  class="btn btn-info">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            @endif
                        </td>

                        <td width="10px">

                                @switch($desmat->status)

                                @case(1)
                                <button wire:click="status({{$desmat}})" class="btn btn-warning">
                                    <i class="fas fa-exclamation-triangle"></i></button>
                                @break
                                @case(2)

                                <button wire:click="status({{$desmat}})" class="btn btn-primary">
                                    <i class="fas fa-spinner"></i></button>
                                @break
                                @case(3)

                                <button wire:click="status({{$desmat}})" class="btn btn-success">
                                    <i class="fas fa-clipboard-check"></i></button>
                                @break
                                @default

                                @endswitch

                        </td>
                        <td>
                            <span
                            class="badge badge-success">
                           {{$desmat->status_name}}
                        </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



            <div class="card-footer">
                {{$desmatriculacion->links()}}
            </div>
        @else


            <div class="card-body">
               <strong>No hay registros ....</strong>
            </div>

        @endif
</div>

</div>
