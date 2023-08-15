<div>



    <div class="card">

        <div class="row">
        <div class="mb-3 col-md-6">


            <label for="Carrera">Filtro por usuario</label>
            <select class="mb-3 text-center form-control form-select form-select-lg" name="bcusuario" id="bcusuario" wire:model='ebusuario'>
                <option value="%%">Todas los Usuarios</option>
                @foreach($usuario as $car)
                    <option value="{{$car->id}}">{{$car->name}}</option>

                @endforeach
            </select>
        </div>
        <div class="py-1 mb-3 col-md-6">

            <label for="Carrera">Filtro por Propuesta</label>
            <select class="mb-3 text-center form-control form-select form-select-sm" name="bcarrera" id="bcarrera" wire:model='ebpropuesta'>
                <option value="%%">Todas las Propuestas</option>
                @foreach($propuesta as $car)
                    <option value="{{$car->id}}">{{$car->name}}</option>

                @endforeach
            </select>


        </div>
        </div>
<?php ($matriculacion);?>
            @if ($matriculacion->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Fecha Envio</th>
                            <th>Aula disponible</th>
                            <th>Usuario</th>
                            <th>email</th>
                            <th>Rol</th>
                            <th>Propuesta</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr>

                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->date_start)->format('d/m/Y')}}</td>
                            <td>{{$mat->user->name}}</td>
                            <td>{{$mat->user->email}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($mat->tipo)
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

                            <td>{{$mat->propuesta->name}}</td>

                            <td width="10px">
                                <button wire:click="download({{$mat->id}})" class="btn btn-info">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">

                                @switch($mat->status)
                                @case(1)
                                <button wire:click="status({{$mat}})" class="btn btn-warning">
                                    <i class="fas fa-exclamation-triangle"></i></button>
                                @break
                                @case(2)

                                <button wire:click="status({{$mat}})" class="btn btn-primary">
                                    <i class="fas fa-spinner"></i></button>
                                @break
                                @case(3)

                                <button wire:click="status({{$mat}})" class="btn btn-success">
                                    <i class="fas fa-clipboard-check"></i></button>
                                @break
                                @case(4)

                                <button wire:click="status({{$mat}})" class="btn btn-danger">
                                    <i class="fas fa-times"></i></button>
                                @break
                                @default

                                @endswitch
                            </td>
                            <td>
                                <span
                                class="badge badge-success">
                               {{$mat->status_name}}
                            </span>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



                <div class="card-footer">
                    {{$matriculacion->links()}}
                </div>
            @else


                <div class="card-body">
                   <strong>No hay registros ....</strong>
                </div>

            @endif





    </div>
</div>
