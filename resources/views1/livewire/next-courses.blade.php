<div >
    @if(count($courses))
<div class="relative w-10/12 mx-auto">


    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- Slides -->

            @foreach($courses as $course)
            <div class="p-4 swiper-slide">
                <div class="flex overflow-hidden rounded shadow">


                        <img class="object-cover w-full h-56" src="{{ url('storage/'.$course->image->url) }}" alt="">

                </div>

            <a target="_blank" href="{{$course->link_inscription}}"
            class="block px-4 mt-1 font-bold text-center text-white bg-yellow-600 rounded hover:bg-green-900">
            Preinscripción
           </a>
            </div>
            @endforeach

        </div>
    </div>



        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

</div>
@else
<div class="flex items-center justify-center h-48 mb-4 bg-white border border-gray-100 rounded-lg shadow-xl">
    <div class="w-10 h-10 duration-300 border-2 border-indigo-500 rounded animate-spin ease"></div>
</div>
@endif
</div>
