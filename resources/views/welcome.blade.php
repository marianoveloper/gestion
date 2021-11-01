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
                        <a class="text-3xl font-bold text-center text-white" href="{{route('categories.show',$category[0])}}">
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
                        <a class="text-3xl font-bold text-center text-white" href="{{route('categories.show',$category[0])}}">
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
    <h1 class="text-3xl text-center text-white">Tenes una consulta escribinos</h1>

</section>
<section class="relative text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto">
      <div class="flex flex-col w-full mb-12 text-center">
        <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font">Completá el Formulario</h1>

      </div>
      <div class="mx-auto lg:w-1/2 md:w-2/3">
        <div class="flex flex-wrap -m-2">
          <div class="w-1/2 p-2">
            <div class="relative">
              <label for="name" class="text-sm leading-7 text-gray-600">Name</label>
              <input type="text" id="name" name="name" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
          </div>
          <div class="w-1/2 p-2">
            <div class="relative">
              <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
              <input type="email" id="email" name="email" class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
            </div>
          </div>
          <div class="w-full p-2">
            <div class="relative">
              <label for="message" class="text-sm leading-7 text-gray-600">Message</label>
              <textarea id="message" name="message" class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
            </div>
          </div>
          <div class="w-full p-2">
            <button class="flex px-8 py-2 mx-auto text-lg text-white bg-yellow-500 border-0 rounded focus:outline-none hover:bg-yellow-600">Enviar</button>
          </div>

        </div>
      </div>
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
