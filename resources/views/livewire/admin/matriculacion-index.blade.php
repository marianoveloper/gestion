<div>

    <div class="card">


            <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>

            @if ($matriculacion->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>UA</th>
                            <th>Carrera</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr>
                            <td>{{$mat->id}}</td>
                            <td>{{$mat->created_at}}</td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($mat->tipo)
                                @case(1)
                                <span
                                    class="inline-flex px-2 text-sm font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                   Alumnos
                                </span>
                                @break
                                @case(2)
                                <span
                                    class="inline-flex px-2 text-sm font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                    Docentes
                                </span>
                                @break

                                @default

                                @endswitch

                            </td>
                            <td>{{$mat->academic->name}}</td>
                            <td>{{$mat->carrera->name}}</td>
                            <td width="10px">
                                <button wire:click="download({{$mat->id}})" class="p-1 text-gray-400 rounded hover:text-blue-500 focus:text-blue-500 focus:ring-2 ring-blue-300 focus:outline-none">

                                </button>
                            </td>
                            <td width="10px">
                                <button wire:click="status({{$mat}})" class="btn btn-danger"><i class="fas fa-trash"></i>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



                <div class="card-footer">

                </div>
            @else


                <div class="card-body">
                   <strong>No hay registros ....</strong>
                </div>

            @endif





    </div>
</div>
