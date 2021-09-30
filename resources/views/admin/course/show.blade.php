<x-app-layout>


    <section class="py-10 mb-8" style="background-image: url({{asset('images/homes/barra-verde.png')}})">
        <div class="container grid grid-cols-3">
            <div class="col-span-2">

                <div class="text-white ">
                    <h3 class="text-4xl">{{$course->type->name}}</h3>
                </div>
                @if($course->status_course==1 || $course->status_course==4)
                <span class="px-2 py-1 mt-2 text-xs text-gray-200 bg-red-600 rounded-full">Inscripciones
                    Abiertas</span>
                @else
                <span class="px-2 py-1 text-xs text-gray-100 bg-gray-900 rounded-full">Inscripciones
                    Finalizadas</span>
                @endif

            </div>
        </div>

    </section>

    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">

        @if(session('info'))
        <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
                <p class="ml-6">Ocurrio un error! {{session('info')}}</p>
                <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                    <svg x-on:click="open: false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>

        </div>

        @endif

        <div class="order-2 lg:col-span-2 lg-order-1">
            <div class="col-span-2">
                <section class="mb-12">

                    <h1 class="mb-2 text-3xl font-bold">Presentación</h1>
                    <div class="text-base text-gray-700">{!! html_entity_decode($course->description) !!}</div>


                </section>
                <section>
                    <article class="mb-4 shadow" x-data="{ open: true }">
                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer"
                            x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600">Objetivos</h1>
                        </header>
                        <div class="px-4 py-2 bg-white" x-show="open">
                            <ul>
                                @forelse($course->goals as $goal)
                                <li class="text-base text-gray-700"><i
                                        class="mr-2 text-gray-600 fas fa-check"></i>{{$goal->name}}</li>
                                @empty

                                <li class="text-base text-gray-700">Este curso no tiene asignado ningun objetivo</li>
                                @endforelse


                            </ul>
                        </div>
                    </article>
                </section>
                <section>

                    <article class="mb-4 shadow" x-data="{ open: false }">
                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer"
                            x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600"><i class="mr-2 fas fa-users"></i>Destinatarios
                            </h1>
                        </header>
                        <div class="px-4 py-2 bg-white" x-show="open">
                            <p class="text-base text-gray-700">{{$course->destination}}</p>
                        </div>
                    </article>


                </section>

                <section>
                    <article class="mb-4 shadow" x-data="{ open: false }">
                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer"
                            x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600"><i
                                    class="mr-2 fas fa-clipboard-list"></i>Requisitos</h1>
                        </header>
                        <div class="px-4 py-2 bg-white" x-show="open">
                            <ul>
                                @forelse($course->requirements as $requirement)
                                <li class="text-base text-gray-700"><i
                                        class="mr-2 fas fa-check-circle"></i>{{$requirement->name}}</li>

                                @empty
                                <li>Sin Requisitos </li>
                                @endforelse
                            </ul>
                        </div>
                    </article>
                </section>
                <section>
                    <article class="mb-4 shadow" x-data="{ open: false }">
                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer"
                            x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600"><i class="mr-2 fas fa-bookmark"></i>Resoluciones
                            </h1>
                        </header>
                        <div class="px-4 py-2 bg-white" x-show="open">
                            <ul>
                                @forelse($course->resolutions as $requirement)
                                <li class="text-base text-gray-700"><i
                                        class="mr-2 fas fa-play-circle"></i>{{$requirement->name}}</li>

                                @empty
                                <li>Sin Resolución asignada</li>
                                @endforelse
                            </ul>
                        </div>
                    </article>
                </section>

            </div>
        </div>
        <div class="order-1 lg:order-2">
            <div class="card md:fixed md:right-20 md:top-20">
                <figure>
                    @if($course->image)
                    <img class="object-cover w-full rounded shadow-lg " src="{{ url('storage/'.$course->image->url) }}"
                        alt="">
                    @endif
                </figure>

                <div class="px-6 py-4">

                    @if($course->status_course==4)<!-- si es permanente-->
                         <p class="mb-2 text-gray-500 text-md">Inicio: Acceso Inmediato</p>
                    @else
                            <p class="mb-2 text-gray-500 text-md">Inicio:
                                {{ \Carbon\Carbon::parse($course->date_start)->format('d/m/Y')}}</p>
                    @endif

                    @if($course->type->category->id==1)<!-- si es una carrera -->
                           <p class="mb-2 text-gray-500 text-md">Duración: {{$course->duration}}</p>

                    @else

                      @if($course->payment!= null && $course->payment->status_price==1)<!-- si contado y no es nulo--->
                                <p class="mb-2 text-gray-500 text-md">Precio Total: ${{$course->price}}</p>
                      @elseif($course->payment!= null && $course->payment->status_price==2)<!--- si es cuotas --->
                                    <p class="mb-2 text-gray-500 text-md">Precio: {{$course->payment->quota}} cuotas de  ${{$course->price}}</p>
                            @elseif($course->payment!= null && $course->payment->status_price==3)<!-- si es gratuito -->
                            <p class="mb-2 text-gray-500 text-md">Participación: Gratuita</p>
                            @endif

                                <p class="mb-2 text-gray-500 text-md">Duracion: {{$course->duration}} </p>
                     @endif

                    <a target="_blank" href="{{$course->link_inscription}}"
                        class="block px-8 py-3 mt-4 text-center text-white bg-yellow-500 border rounded hover:border-gray-500 hover:bg-white hover:text-green-900">
                        PreInscripcion
                    </a>
                    <a target="_blank" href="{{$course->url_info}}"
                        class="block px-8 py-3 mt-4 text-center text-green-900 border border-green-900 rounded hover:border-white hover:bg-yellow-500 hover:text-white">Informativo</a>
                </div>

                <form action="{{route('admin.course.aproved',$course)}}" class="mt-4" method="POST">
                    @csrf

                    <button type="submit" class="w-full btn btn-danger">Aprobar Propuesta</button>
                </form>
            </div>
        </div>

    </div>



</x-app-layout>
