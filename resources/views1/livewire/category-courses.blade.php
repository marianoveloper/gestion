<div>
    @if(count($courses))
    <div class="glider-contain">
        <ul class="glider">
            @foreach($courses as $course)
            <li class="bg-white rounded-lg shadow {{$loop->last ? '' : 'sm:mr-4'}}">
                <a href="{{route('courses.show', $course)}}">
                    <article>
                        <figure>
                            <img class="object-cover object-center w-full"
                                src="{{ url('storage/'.$course->image->url) }}" alt="">
                        </figure>
                        <div class="px-6 py-4">
                            <!--<h1 class="mb-2 text-xl leading-6 text-gray-700">{{Str::limit($course->title,40)}}</h1>-->
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
                    </article>
                </a>
            </li>
            @endforeach
        </ul>

        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
    </div>
    @else
    <div class="flex items-center justify-center h-48 mb-4 bg-white border border-gray-100 rounded-lg shadow-xl">
        <div class="w-10 h-10 duration-300 border-2 border-indigo-500 rounded animate-spin ease"></div>
    </div>
    @endif
</div>
