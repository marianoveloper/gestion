<div>

    <div class="card">
<div class="row>">
    <div class="col-md-4">
        <label for="Carrera">Carreras</label>
        <select wire:model="carreraFilter" class="form-control" wire:change='listarmateria($event.target.value)'>
            <option value="%%">Todas las Carreras</option>
            @foreach($carreras as $car)
                <option value="{{$car->id}}">{{$car->name}}</option>

            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="Materia">Materias</label>
        <select wire:model="materiaFilter" class="form-control">
            <option value="%%">Todas las Materias</option>
            @foreach($materias as $mat)
                <option value="{{$mat->id}}">{{$mat->name}}</option>

            @endforeach
        </select>
    </div>
    <!--<div class="col-md-4">
        <label for="searchFilter">Buscar</label>
        <input wire:model="searchFilter" class="form-control" type="text" name="searchFilter" id="searchFilter">
    </div>-->
</div>




            @if ($matriculacion->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Fecha Envio</th>
                            <th>Hora Envio</th>
                            <th>Aula disponible</th>
                            <th>Hora disponible</th>
                            <th>Rol</th>
                            <th>Unidad Académica</th>
                            <th>Carrera</th>
                            <th>Materia</th>
                            <th>Año</th>
                            <th>Codigo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr>

                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('H:i')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->date_start)->format('d/m/Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->time_start)->format('H:i')}}</td>

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
                                 @case(8)
                                <span
                                    class="badge badge-info">
                                   Secretario Académico
                                </span>
                                @break
                                @default

                                @endswitch


                            </td>
                            <td>{{$mat->academic->name}}</td>
                            <td>{{$mat->carrera->name}}</td>
                            @if(@isset($mat->materia))
                              <td>{{$mat->materia->name}}</td>
                              <td>{{$mat->materia->year}}</td>
                              <td>{{$mat->materia->code}}</td>
                            @else
                             <td> </td>
                             <td> </td>
                             <td> </td>
                            @endif
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
