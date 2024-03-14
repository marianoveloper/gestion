<div>
    <div>

        <div class="px-6 py-3 card">



            <div class="px-6 py-4">

                <h5 class="font-semibold text">Unidad Academica:  {{$academic->name}} </h5>
            </div>



                @if ($desmatriculacion->count())

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>

                                <th scope="col" class="px-6 py-3">Fecha Envio</th>
                                <th scope="col" class="px-6 py-3">Hora Envio</th>
                                <th scope="col" class="px-6 py-3">Rol</th>
                                <th scope="col" class="px-6 py-3">Propuesta</th>



                               <!-- <th>Unidad Académica</th>-->

                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-center">Dni</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Enviado</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Completado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desmatriculacion as $mat)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('H:i')}}</td>


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
                                      Asesor Pedagógico
                                    </span>
                                    @break

                                    @default

                                    @endswitch


                                </td>

                                <td>{{$mat->propuesta->name}}</td>
                                <td>{{$mat->name}}</td>
                                <td>{{$mat->dni}}</td>
                                <td>{{$mat->email}}</td>

                                <td width="10px">
                                    @if(isset($mat->resource->id))
                                    <button wire:click="download({{$mat->id}})" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"> <i class="fas fa-download"></i></button>
                                    @else

                                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><i class="fas fa-ellipsis-h"></i></button>
                                    @endif
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
                    {{$desmatriculacion->links()}}
                </div>

                @else


                    <div class="card-body">
                       <strong>No hay registros ....</strong>
                    </div>

                @endif





        </div>
    </div>

</div>

