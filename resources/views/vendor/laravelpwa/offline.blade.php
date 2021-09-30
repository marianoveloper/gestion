@extends('layouts.app')

@section('content')

<section class="bg-cover" style="background-image: url({{asset('images/homes/portada-19b.png')}})">
    <div class="px-4 max-w-7x1 max-auto sm:px-6 lg:px-8 py-36">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-4xl text-green-900">Estudiá Online en la Uccuyo </h1>
            <p class="mt-2 mb-4 text-lg text-green-800"> Ofrecemos Capacitaciones a Distancia</p>


            @livewire('search')

        </div>
    </div>

</section>

<section class="mt-24">
    <h1 class="mb-6 text-3xl text-center text-green-900">Propuestas Virtuales </h1>
    <div
        class="grid grid-cols-1 px-4 mx-auto gap-x-6 gap-y-8 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <article>
            <a href="{{route('categories.show',$category[0])}}">
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src={{asset('images/homes/carrera.png')}}>

                </figure>

                <header class="mt-2">
                    <h1 class="text-2xl text-center text-green-900 hover:text-yellow-600 hover:underline"> Carreras
                    </h1>
                </header>
            </a>
        </article>
        <article>
            <a href="{{route('categories.show',$category[1])}}">
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src={{asset('images/homes/diplomatura.png')}}>

                </figure>
                <header class="mt-2">
                    <h1 class="text-2xl text-center text-green-900 hover:text-yellow-600 hover:underline ">
                        Diplomaturas y Especializaciones </h1>
                </header>
            </a>
        </article>

        <article>
            <a href="{{route('categories.show',$category[2])}}">
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src={{asset('images/homes/curso.png')}}>

                </figure>
                <header class="mt-2">
                    <h1 class="text-2xl text-center text-green-900 hover:text-yellow-600 hover:underline">Cursos de
                        Capacitación </h1>
                </header>
            </a>
        </article>

    </div>

</section>

<section class="py-12 mt-20" style="background-image: url({{asset('images/homes/barra.png')}})">
    <h1 class="text-3xl text-center text-white">¿No sabes que Estudiar?</h1>
    <p class="text-center text-white"> Busca en el catálogo de propuestas y encontra lo que buscas</p>
    <div class="flex justify-center mt-4">
        <a href="{{route('courses.index')}}"
            class="block px-4 py-2 mt-4 font-bold text-center text-white bg-green-600 rounded hover:bg-green-900">
            Catálogo de Propuestas
        </a>
    </div>
    </div>
</section>
<div class="container py-8">
    <section>
        <h1 class="mb-6 text-3xl text-center text-green-900">DESTACADOS</h1>
        @livewire('category-courses')
    </section>
</div>
<section class="py-8 " style="background-image: url({{asset('images/homes/barra-verde.png')}})">
    <h1 class="text-3xl text-center text-white">Próximamente</h1>

</section>
<div class="container py-8">
    <section>

        @livewire('next-courses')
    </section>
</div>
<!--------------------------------------------------->
<x-wsp/>>
<x-slot name="js">


    <script>
        new Glider(document.querySelector('.glider'), {
            // Mobile-first defaults
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            },
            responsive: [{
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 'auto',
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
            }, {
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.25
                }
            }]
        });

    </script>
    <script>
        var botmanWidget = {
            frameEndpoint: '/botman/chat',
            title: "Uccuyo Virtual",
            introMessage: ' Hola ✋ a Uccuyo Virtual En que podemos ayudarte?',
            mainColor: '#fd9807',
            bubbleBackground: '#fd9807',
            bubbleAvatarUrl: '../images/chat5.png',
            placeholderText: 'Ingresa tu consulta',
            aboutLink: 'www.evirtualsj.com',
            aboutText: 'DEV Uccuyo',
        };

    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</x-slot>

@endsection
