<x-app-layout>



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



                <form action="{{route('admin.course.aproved',$course)}}" class="mt-4" method="POST">
                    @csrf

                    <button type="submit" class="w-full btn btn-danger">Aprobar Propuesta</button>
                </form>
            </div>
        </div>

    </div>



</x-app-layout>
