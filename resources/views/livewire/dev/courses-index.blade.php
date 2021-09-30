<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">Lista de Propuestas</h2>

            <x-button-enlace class="ml-auto" href="{{route('dev.courses.create')}}">
                Crear Curso
            </x-button-enlace>

        </div>

    </x-slot>


    <div class="container py-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table-responsive>
            <div class="flex px-6 py-4">
                <input wire:keydown="limpiar_page" wire:model="search"
                    class="flex-1 w-full h-10 px-5 pr-16 bg-white border-2 border-gray-300 rounded-lg text-md focus:outline-none"
                    placeholder="Ingrese el nombre de un curso...">

            </div>
            @if($courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Titulo
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Categoria
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Estado
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Fecha de Inicio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Fecha Limite Insc.
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Curso
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($courses as $course )


                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    @isset($course->image)
                                    <img id="picture" class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ url('storage/'.$course->image->url) }}">
                                    @else
                                    <img id="picture" class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{asset('images/cursos/9.png')}}">
                                    @endisset
                                </div>

                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">

                                        {{Str::limit($course->title,20)}}
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">{{$course->type->category->name}}</div>
                            <div class="text-sm text-gray-500">{{$course->type->name}}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            @switch($course->status)
                            @case(1)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                Borrador
                            </span>
                            @break
                            @case(2)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                Revision
                            </span>
                            @break
                            @case(3)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                Publicado
                            </span>
                            @break
                            @default

                            @endswitch

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">{{$course->date_start}}</div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">{{$course->date_limit}}</div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm text-gray-900">$ {{$course->price}}</div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @switch($course->status_course)
                            @case(1)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                Activo
                            </span>
                            @break
                            @case(2)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                Proximamente
                            </span>
                            @break
                            @case(3)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                Finalizado
                            </span>
                            @break
                            @case(4)
                            <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-blue-100 rounded-full">
                                Permanente
                            </span>
                            @break
                            @default

                            @endswitch

                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="{{route('dev.courses.edit',$course)}}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>

                    @endforeach


                    <!-- More people... -->
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente
            </div>
            @endif


        </x-table-responsive>



    </div>
</div>
