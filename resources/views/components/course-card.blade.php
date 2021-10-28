@props(['course'])

<article class="overflow-hidden bg-white rounded shadow-lg ">
    <figure>
        <img class="object-cover object-center w-full" src="{{ url('storage/'.$course->image->url) }}" alt="">

    </figure>
    <div class="px-6 py-4">
        <!--<h1 class="mb-2 text-xl leading-6 text-gray-700">{{Str::limit($course->title,40)}}</h1>-->
        @if($course->status_course==4)
        <p class="mb-2 text-sm text-gray-500">Inicio: Acceso Inmediato</p>
        @else
        <p class="mb-2 text-sm text-gray-500">Inicio: {{ \Carbon\Carbon::parse($course->date_start)->format('d/m/Y')}}
        </p>
        @endif   
 


      
        <a href="{{route('courses.show', $course)}}"
            class="block px-4 py-2 mt-4 font-bold text-center text-white bg-green-500 rounded hover:bg-green-700">
            Ver
        </a>
    </div>
</article>
<!-- component -->
<!-- This is an example component -->
<div class="max-w-lg mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5">
        <a href="#">
            <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="font-normal text-gray-700 mb-3">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="#">
                Read more
            </a>
        </div>
    </div>
    <p>This card component is part of a larger, open-source library of Tailwind CSS components. Learn more by going to the official <a class="text-blue-600 hover:underline" href="https://flowbite.com/docs/getting-started/introduction/" target="_blank">Flowbite Documentation</a>.</p>
</div>