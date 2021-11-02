<x-app-layout>

  <!-- component -->
<section class="px-4 mx-auto mt-10 mb-12 max-w-7xl sm:px-6 lg:px-4">
    <h1 class="mb-6 text-3xl text-center text-green-900">Sistema de Gestión Virtual </h1>
    <article>
        <h2 class="text-2xl font-extrabold text-gray-900"></h2>
        <section class="grid grid-cols-1 mt-6 md:grid-cols-1 lg:grid-cols-3 gap-x-6 gap-y-8">
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
                style="background-image: url({{asset('images/homes/carrera.png')}});">
                <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
                <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                    <h3 class="text-center">
                        <a class="text-3xl font-bold text-center text-white " href="{{route('categories.show',$category[0])}}">
                            <span class="absolute inset-0"></span>
                            {{$category[0]->name}}
                        </a>
                    </h3>
                </div>
            </article>
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
                style="background-image: url({{asset('images/homes/curso.png')}});">
                <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
                <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                    <h3 class="text-center">
                        <a class="text-3xl font-bold text-center text-white" href="{{route('categories.show',$category[1])}}">
                            <span class="absolute inset-0"></span>
                            {{$category[1]->name}}
                        </a>
                    </h3>
                </div>
            </article>
            <article class="relative w-full h-64 overflow-hidden transition duration-300 ease-in-out bg-center bg-cover rounded-lg shadow-lg group hover:shadow-2xl"
                style="background-image: url({{asset('images/homes/diplomatura.png')}});">
                <div class="absolute inset-0 transition duration-300 ease-in-out bg-black bg-opacity-50 group-hover:opacity-75"></div>
                <div class="relative flex items-center justify-center w-full h-full px-4 sm:px-6 lg:px-4">
                    <h3 class="text-center">
                        <a class="text-3xl font-bold text-center text-white" href="{{route('categories.show',$category[2])}}">
                            <span class="absolute inset-0"></span>
                            {{$category[2]->name}}
                        </a>
                    </h3>
                </div>
            </article>

        </section>
    </article>
</section>
<section class="py-8 mt-20" style="background-image: url({{asset('images/homes/barra-verde.png')}})">
    <h1 class="text-3xl text-center text-white">Tenés alguna consulta o sugerencia</h1>

    <div class="flex justify-center mt-4">
        <a href="{{route('consulta.index')}}"
            class="block px-4 py-3 mt-4 font-bold text-center text-white bg-yellow-600 rounded hover:bg-yellow-900">
            Contactanos
        </a>
    </div>
</section>




    <!--------------------------------------------------->

    <x-slot name="js">




        <!--<script>
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
        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>-->
    </x-slot>


</x-app-layout>
