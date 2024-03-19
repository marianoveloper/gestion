<div>
    <div>

        <div class="px-6 py-3 card">



            <div class="px-6 py-4">

                <h5 class="font-semibold text">Unidad Academica:  {{$academic->name}} </h5>
            </div>



            @if ($propuestas->count())

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>

                                <th scope="col" class="px-6 py-3">Fecha Envio</th>
                                <th scope="col" class="px-6 py-3">Unidad Academica</th>
                                <th scope="col" class="px-6 py-3">Propuesta</th>
                                <th scope="col" class="px-6 py-3">Descripción</th>
                                <th scope="col" class="px-6 py-3">Programa</th>
                                <th scope="col" class="px-6 py-3">Resolución</th>
                                <th scope="col" class="px-6 py-3">Responsables</th>





                               <!-- <th>Unidad Académica</th>-->


                                <!--<th scope="col" class="px-6 py-3">Enviado</th>-->
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Completado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($propuestas as $cat)


                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td>{{ \Carbon\Carbon::parse($cat->created_at)->format('d/m/Y')}}</td>

                                <td>{{$cat->academic->name}}</td>

                                <td>{{$cat->title}}</td>
                              <!--  <td width="10px">
                                    <a href="{{route('admin.apertura-propuesta.show',$cat->id)}}" class="btn btn-success"><i class="fas fa-info"></i></a>

                                </td>-->
                                <td width="10px">
                                    <button wire:click="descargaDescripcion({{$cat->id}})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </td>
                                <td width="10px">
                                    <button wire:click="descargaPrograma({{$cat->id}})" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </td>
                                <td width="10px">
                                    <button wire:click="descargaResolucion({{$cat->id}})" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </td>
                                <td width="10px">
                                    <button wire:click="descargaUsuario({{$cat->id}})" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </td>

                                <td width="10px">

                                    @switch($cat->status)
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

                                    @if($cat->status==3)
                                    {{ \Carbon\Carbon::parse($cat->updated_at)->format('d/m/Y')}}
                                    @elseif($cat->status==2)
                                    <span>En Proceso</span>
                                    @elseif($cat->status==4)
                                    <span>Error</span>
                                    @elseif($cat->status==1)
                                    <span>En espera</span>
                                   @endif

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>



                <div class="pt-4 card-footer">
                    {{$propuestas->links()}}
                </div>

                @else


                    <div class="card-body">
                       <strong>No hay registros ....</strong>
                    </div>

                @endif





        </div>
    </div>

</div>

