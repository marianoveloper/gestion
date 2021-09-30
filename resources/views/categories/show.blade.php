<x-app-layout>

    <x-redes/>
    <section class="bg-cover" style="background-image: url({{asset('images/homes/portada-19b.png')}})">
        <div class="px-4 max-w-7x1 max-auto sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-4xl text-green-900 font-fold">Estudiá Online en la UCCuyo </h1>
                <p class="mt-2 mb-4 text-lg text-green-800"> Ofrecemos Capacitaciones a Distancia</p>


               @livewire('search')

            </div>
        </div>

    </section>

    @livewire('category-filter',['category' => $category])
    <x-wsp/>
    <x-slot name="js">
        <script>
            var botmanWidget = {
                frameEndpoint: '/botman/chat',
                title:"Uccuyo Virtual",
                 introMessage: 'Hola a Uccuyo Virtual En que podemos ayudarte?',
                 mainColor: '#fd9807',
                 bubbleBackground:'#fd9807',
                 bubbleAvatarUrl:'../images/chatbot4.png',
                 placeholderText: 'Ingresa tu consulta',
                 aboutLink: 'www.evirtualsj.com',
                 aboutText: 'DEV Uccuyo',
            };
            </script>
           <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    </x-slot>
</x-app-layout>
