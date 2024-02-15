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

                    </div>


                </div>

                <div class="mt-4 mb-4 md:mt-auto">
                    <x-jet-button href="{{$course->link_form}}">
                        Ingresar
                    </x-jet-button>
                </div>
            </div>
        </article>
    </a>
</li>
