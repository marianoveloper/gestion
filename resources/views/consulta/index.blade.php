<x-app-layout>
    <div>
            <div class="text-center">
                @if (session('info'))
                    <a href="/" class="items-center w-full px-4 py-3 text-sm font-bold text-center text-white bg-yellow-500 rounded hover:bg-yellow-700">{{session('info')}}! Volver al Menu</a>
                @endif

            </div>


    </div>
    <div class="flex items-center justify-center ">

        <form id="form" action="{{route('consulta.store')}}" method="POST" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            @csrf
            <br>
            <h1 class="block mb-2 text-xl font-bold text-center text-gray-700">COMPLETA LOS DATOS Y ESCRIBE TU SUGERENCIA O CONSULTA</h1>
            <br>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Nombre
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="name" id="name" type="text" placeholder="Ingresa tu nombre" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Correo
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="email" id="email" type="email" placeholder="Ingresa tu correo" required>
            </div>

            <div class="mb-4">

                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Mensaje
                </label>
                <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="mensaje" id="mensaje" type="text" placeholder="Escríbe tu mensaje Aquí"required></textarea>
            </div>

            <div class="flex items-center justify-between">

                <button id="submit"
                    class="px-4 py-3 text-sm font-bold text-center text-white bg-green-600 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline"
                    type="submit">
                    <i class="fa fa-envelope"></i> Enviar
                </button>
            </div>

            <div class="mb-4">


        </form>

    </div>
</x-app-layout>
