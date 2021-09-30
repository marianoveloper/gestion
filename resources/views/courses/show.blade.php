<x-app-layout>


    <section class="py-10 mb-8" style="background-image: url({{asset('images/homes/barra-verde.png')}})">
        <div class="container grid grid-cols-3">
            <div class="col-span-2">

                <div class="mb-2 text-white">

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
                                @foreach($course->goals as $goal)
                                <li class="text-base text-gray-700"><i
                                        class="mr-2 text-gray-600 fas fa-check"></i>{{$goal->name}}</li>
                                @endforeach


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
                    <img class="object-cover w-full rounded shadow-lg " src="{{ url('storage/'.$course->image->url) }}"
                        alt="">
                </figure>

                <div class="px-6 py-4">

                    @if($course->status_course==4)<!--si es permanente-->
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


                 @if($course->payment->status_link==2)
                    <a target="_blank" href="{{$course->link_inscription}}"
                        class="block px-8 py-3 mt-4 text-center text-white bg-yellow-500 border rounded hover:border-gray-500 hover:bg-white hover:text-green-900">
                        PreInscripción
                    </a>
                @else
                <a target="_blank" href="{{$course->link_inscription}}"
                    class="block px-8 py-3 mt-4 text-center text-white bg-yellow-500 border rounded hover:border-gray-500 hover:bg-white hover:text-green-900">
                    Inscripción
                </a>
                @endif
                    <a target="_blank" href="{{$course->url_info}}"
                        class="block px-8 py-3 mt-4 text-center text-green-900 border border-green-900 rounded hover:border-white hover:bg-yellow-500 hover:text-white">Informativo</a>
                </div>


            </div>
        </div>

    </div>

    <x-wsp />
    <x-slot name="js">

        <script>
            var botmanWidget = {
                frameEndpoint: '/botman/chat',
                title: "Uccuyo Virtual",
                introMessage: 'Hola 👋 Bienvenida/o a UCCuyo Virtual. Soy tu asistente virtual. En qué puedo ayudarte?',
                mainColor: '#fd9807',
                bubbleBackground: '#fd9807',
                bubbleAvatarUrl: '../images/chatbot4.png',
                placeholderText: 'Ingresa tu consulta',
                aboutLink: 'www.evirtualsj.com',
                aboutText: 'DEV Uccuyo',
            };

        </script>
        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    </x-slot>
</x-app-layout>
