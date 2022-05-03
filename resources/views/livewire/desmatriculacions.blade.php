<div class="py-12">

<div class="mx-auto max-w-7xl sm:px6 lg:px8">
    <section class="py-8 " style="background-image: url({{asset('images/homes/barra-verde.png')}})">
        <h1 class="text-3xl text-center text-white">Desmatriculación</h1>


    </section>
    <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">


    <div class="text-center">
        @if (session('info'))
        <a href="/"
            class="items-center w-full px-4 py-3 text-sm font-bold text-center text-white bg-yellow-500 rounded hover:bg-yellow-700">{{session('info')}}!
            Volver al Menu</a>

        @endif

    </div>


        <button wire:click="desmatricular()" class="px-4 py-2 my-3 font-bold text-white bg-green-500 hover:bg-yellow-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green">Agregar Desmatriculación</button>
       @if($modal)
        @include('livewire.modal')
    @endif

        <table class="w-full table-fixed">
            <thead>
                <tr class="text-white bg-indigo-600">


                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Dni</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Unidad Académica</th>
                    <th class="px-4 py-2">Carrera</th>


                </tr>
            </thead>
            <tbody>
                @foreach($desmatriculacion as $desmat)
                <tr>


                             <td class="px-4 py-2 text-center">{{$desmat->name}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->dni}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->email}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->academic->name}}</td>
                              <td class="px-4 py-2 text-center">{{$desmat->carrera->name}}</td>




                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>





</div>
