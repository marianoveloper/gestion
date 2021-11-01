@props(['course'])
<li class="bg-white rounded-lg shadow">
    <a href="{{route('courses.show', $course)}}">
        <article>
            <figure>
                <img class="object-cover object-center w-full" src="{{ url('storage/'.$course->image->url) }}" alt="">
            </figure>
            <div class="px-6 py-4">

                <a target="_blank" href="{{$course->link_form}}"
                    class="block px-4 py-2 mt-4 font-bold text-center text-white bg-green-600 rounded hover:bg-green-800">
                    Ingresar
                </a>
            </div>
        </article>
    </a>

</li>
