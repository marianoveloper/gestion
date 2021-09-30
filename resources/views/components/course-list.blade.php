@props(['course'])

<li class="mb-4 bg-white rounded-lg shadow">
    <a href="{{route('courses.show', $course)}}">
        <article class="md:flex">
            <figure>
                <img class="object-cover object-center w-full md:w-56 " src="{{ url('storage/'.$course->image->url) }}"
                    alt="">
            </figure>

            <div class="flex flex-col flex-1 px-6 py-4">
                <div class="justify-between lg:flex">
                    <div>
                        <h1 class="mb-2 text-lg font-semibold text-gray-700 ">{{ Str::limit($course->title,40) }}</h1>
                        @if($course->status_course==4)
                        <p class="mb-2 text-sm text-gray-500">Inicio: Acceso Inmediato</p>
                        @else
                        <p class="mb-2 text-sm text-gray-500">Inicio:
                            {{ \Carbon\Carbon::parse($course->date_start)->format('d/m/Y')}}</p>
                        @endif
                        @if($course->type->category->id==1)
                        <p class="mb-2 text-sm text-gray-500">Duración: {{$course->duration}}</p>

                        @else
                        @if($course->payment!= null && $course->payment->status_price==1)<!-- si contado y no es nulo--->
                                <p class="mb-2 text-gray-500 text-md">Precio Total: ${{$course->price}}</p>
                      @elseif($course->payment!= null && $course->payment->status_price==2)<!--- si es cuotas --->
                                    <p class="mb-2 text-gray-500 text-md">Precio: {{$course->payment->quota}} cuotas de  ${{$course->price}}</p>
                            @elseif($course->payment!= null && $course->payment->status_price==3)<!-- si es gratuito -->
                            <p class="mb-2 text-gray-500 text-md">Participación: Gratuita</p>
                     @endif
                        @endif
                    </div>

                    <div class="flex items-center">
                        <ul class="flex text-sm">
                            <li>
                                @if($course->status_course==1 || $course->status_course==4)
                                <span class="px-2 py-1 mt-1 text-sm text-gray-200 bg-green-600 rounded-full">Inscripciones
                                    Abiertas</span>
                                @else
                                <span class="px-2 py-1 text-sm text-gray-100 bg-gray-900 rounded-full">Inscripciones
                                    Finalizadas</span>
                                @endif
                            </li>


                    </div>
                </div>

                <div class="mt-4 mb-4 md:mt-auto">
                    <x-danger-enlace href="{{ route('courses.show', $course) }}">
                        Más información
                    </x-danger-enlace>
                </div>
            </div>
        </article>
    </a>
</li>
