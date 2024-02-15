<div>

    <div class="px-6 py-3 card">



          <!--  <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>-->
    <!--<div class="pb-4 card-header col-3">
        <label for="Carrera">Filtro por Carrera</label>
        <select class="mb-3 text-center form-select form-select-lg" name="bcarrera" id="bcarrera" wire:model='ebcarrera'>
            <option value="%%">Todas las Carreras</option>
            @foreach($carrera as $car)
                <option value="{{$car->id}}">{{$car->name}}</option>

            @endforeach
        </select>
    </div>-->


            @if ($matriculacion->count())
            <div class="px-6 py-4">
                <h5 class="font-semibold text">Unidad Academica:  {{$matriculacion[0]->academic->name}} </h5>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">Fecha Envio</th>
                            <th scope="col" class="px-6 py-3">Hora Envio</th>
                            <th scope="col" class="px-6 py-3">Aula Disponible</th>

                            <th scope="col" class="px-6 py-3">Rol</th>
                           <!-- <th>Unidad Académica</th>-->
                            <th>Carrera</th>
                            <th scope="col" class="px-6 py-3">Materia</th>
                            <th scope="col" class="px-6 py-3 text-center">Año</th>

                            <th scope="col" class="px-6 py-3">Enviado</th>
                            <th scope="col" class="px-6 py-3">Estado</th>
                            <th scope="col" class="px-6 py-3">Completado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('H:i')}}</td>
                            <td>{{ \Carbon\Carbon::parse($mat->date_start)->format('d/m/Y')}}</td>

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
                           <!-- <td>{{$mat->academic->name}}</td>-->
                            <td>{{$mat->carrera->name}}</td>

                            @if(@isset($mat->materia))

                              <td>{{$mat->materia->name}}</td>
                              <td>{{$mat->materia->year}}</td>
                            @else
                             <td> </td>
                             <td> </td>

                            @endif
                           <td width="10px">

                              <button wire:click="download({{$mat->id}})" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"> <i class="fas fa-download"></i></button>
                            </td>
                            <td width="10px">

                                    @switch($mat->status)
                                    @case(1)

                                    <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900"><i class="fas fa-exclamation-triangle"></i></button>
                                    @break
                                    @case(2)
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-spinner"></i>
                                        @break
                                        @case(3)
                                    <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> <i class="fas fa-clipboard-check"></i></button>


                                    @break
                                    @case(4)
                                    <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fas fa-times"></button>

                                    @break
                                    @default

                                    @endswitch

                            </td>
                            <td>

                                @if($mat->status==3)
                                {{ \Carbon\Carbon::parse($mat->updated_at)->format('d/m/Y')}}
                                @elseif($mat->status==2)
                                <span>En Proceso</span>
                                @elseif($mat->status==4)
                                <span>Error</span>
                                @elseif($mat->status==1)
                                <span>En espera</span>
                               @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



            <div class="pt-4 card-footer">
                {{$matriculacion->links()}}
            </div>

            @else


                <div class="card-body">
                   <strong>No hay registros ....</strong>
                </div>

            @endif





    </div>
</div>
