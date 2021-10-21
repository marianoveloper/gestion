<x-app-layout>

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
                        <h1 class="text-2xl text-center text-green-900 hover:text-yellow-600 hover:underline">
                            {{$category[0]->name}}
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
                            {{$category[1]->name}} </h1>
                    </header>
                </a>
            </article>

            <article>
                <a href="{{route('categories.show',$category[2])}}">
                    <figure>
                        <img class="object-cover w-full rounded-xl h-36" src={{asset('images/homes/curso.png')}}>

                    </figure>
                    <header class="mt-2">
                        <h1 class="text-2xl text-center text-green-900 hover:text-yellow-600 hover:underline">
                            {{$category[2]->name}} </h1>
                    </header>
                </a>
            </article>

        </div>

    </section>

    <section class="py-12 mt-20" style="background-image: url({{asset('images/homes/barra-verde.png')}})">
        <h1 class="text-3xl text-center text-white">¿No sabes que Estudiar?</h1>
        <p class="text-center text-white"> Buscá en el catálogo de propuestas y encontrá lo que necesitas</p>
        <div class="flex justify-center mt-4">

        </div>
        </div>
    </section>


<!-- component -->
<section class="px-4 mx-auto mb-12 max-w-7xl sm:px-6 lg:px-4">
    <article>
        <h2 class="text-2xl font-extrabold text-gray-900">BLOG</h2>
        <section class="grid grid-cols-1 mt-6 md:grid-cols-1 lg:grid-cols-3 gap-x-6 gap-y-8">
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
                style="background-image: url('https://images.unsplash.com/photo-1623479322729-28b25c16b011?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1740&q=80');">
                <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
                <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                    <h3 class="text-center">
                        <a class="text-2xl font-bold text-center text-white" href="#">
                            <span class="absolute inset-0"></span>
                            Top 10 highest paid programming languages of 2021
                        </a>
                    </h3>
                </div>
            </article>
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
                style="background-image: url('https://images.unsplash.com/photo-1569012871812-f38ee64cd54c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
                <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
                <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                    <h3 class="text-center">
                        <a class="text-2xl font-bold text-center text-white" href="#">
                            <span class="absolute inset-0"></span>
                            Python Frameworks
                        </a>
                    </h3>
                </div>
            </article>
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
                style="background-image: url('https://images.unsplash.com/photo-1511376777868-611b54f68947?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80');">
                <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
                <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                    <h3 class="text-center">
                        <a class="text-2xl font-bold text-center text-white" href="#">
                            <span class="absolute inset-0"></span>
                            The best plugins for Visual Studio Code
                        </a>
                    </h3>
                </div>
            </article>
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
            style="background-image: url('https://images.unsplash.com/photo-1511376777868-611b54f68947?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80');">
            <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
            <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                <h3 class="text-center">
                    <a class="text-2xl font-bold text-center text-white" href="#">
                        <span class="absolute inset-0"></span>
                        The best plugins for Visual Studio Code
                    </a>
                </h3>
            </div>
        </article>
        <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
        style="background-image: url('https://images.unsplash.com/photo-1511376777868-611b54f68947?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80');">
        <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
        <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
            <h3 class="text-center">
                <a class="text-2xl font-bold text-center text-white" href="#">
                    <span class="absolute inset-0"></span>
                    The best plugins for Visual Studio Code
                </a>
            </h3>
        </div>
    </article>
    <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
    style="background-image: url('https://images.unsplash.com/photo-1511376777868-611b54f68947?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80');">
    <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
    <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
        <h3 class="text-center">
            <a class="text-2xl font-bold text-center text-white" href="#">
                <span class="absolute inset-0"></span>
                The best plugins for Visual Studio Code
            </a>
        </h3>
    </div>
</article>
        </section>
    </article>
</section>

    <!--------------------------------------------------->

    <x-slot name="js">




        <script>
            var botmanWidget = {
                frameEndpoint: '/botman/chat',
                title: "Uccuyo Virtual",
                introMessage: ' Hola 👋 Bienvenida/o a UCCuyo Virtual. Soy tu asistente virtual. En qué puedo ayudarte?',
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


</x-app-layout>
