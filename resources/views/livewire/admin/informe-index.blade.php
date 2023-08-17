<div>

    <div class="card">


          <!--  <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>-->



            @if ($matriculacion->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Fecha Envio</th>
                            <th>Hora Envio</th>

                             <th>Semestre</th>
                             <th>Destinado</th>
                            <th>Unidad Académica</th>
                            <th>Carrera</th>
                            <th>Materia</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr>

                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('H:i')}}</td>

                             <td class="px-6 py-4 whitespace-nowrap">
                                @switch($mat->semestre)
                                @case(1)
                                <span
                                    class="badge badge-success">
                                   1º Semestre
                                </span>
                                @break
                                @case(2)
                                <span
                                    class="badge badge-primary">
                                   2º Semestre
                                @break
                                @case(3)
                                <span
                                    class="badge badge-primary">
                                  1º y 2º Semestre
                                @break
                                @default

                                @endswitch


                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($mat->destinado)
                                @case(1)
                                <span
                                    class="badge badge-success">
                                   Decano
                                </span>
                                @break
                                @case(2)
                                <span
                                    class="badge badge-primary">
                                   Secretaria Académica
                                @break
                                @case(3)
                                <span
                                    class="badge badge-primary">
                                 Decano y Secretaria Académica
                                @break
                                @default

                                @endswitch


                            </td>
                            <td>{{$mat->academic->name}}</td>
                            <td>{{$mat->carrera->name}}</td>
                            <td>{{$mat->materias}}</td>



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
