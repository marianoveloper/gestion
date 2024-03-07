<div>

    <div class="card">


        <div class="row">
            <div class="mb-3 col-md-6">

                <label for="Carrera">Carreras</label>
                <select wire:model="carreraFilter" class="mb-3 text-center form-control form-select form-select-lg"
                    wire:change='listarmateria($event.target.value)'>
                    <option value="">Todas las Carreras</option>
                    @foreach($carreras as $car)
                    <option value="{{$car->id}}">{{$car->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="Materia">Materias</label>
                <select wire:model="materiaFilter" class="mb-3 text-center form-control form-select form-select-lg">
                    <option value="">Todas las Materias</option>
                    @foreach($materias as $mat)
                    <option value="{{$mat->id}}">{{$mat->name}}</option>

                    @endforeach
                </select>
            </div>

        </div>

            @if ($matriculacion->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha de Envio</th>
                            <th>Fecha Examen</th>
                            <th>Hora disponible del aula para alumnos</th>
                            <th>Unidad Académica</th>
                            <th>Carrera</th>
                            <th>Materia</th>

                            <th span=2>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr>
                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->date_start)->format('d/m/Y')}}</td>

                            <td>{{ \Carbon\Carbon::parse($mat->time_start)->format('H:i')}}</td>

                            <td>{{$mat->academic->name}}</td>
                            <td>{{$mat->carrera->name}}</td>
                            @if(@isset($mat->materia))
                            <td>{{$mat->materia->name}}</td>


                          @else
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
