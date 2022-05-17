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


        <button wire:click="desmatricular()" class="px-4 py-2 my-3 font-bold text-white bg-yellow-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green">Desmatricular de a uno</button>
       @if($modal)
        @include('livewire.modal')
    @endif
    <button wire:click="desmatricular2()" class="px-4 py-2 my-3 font-bold text-white bg-green-800 hover:bg-yellow-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green">Listado de Desmatriculación</button>
    @if($modal2)
     @include('livewire.modaldesmatricular')
 @endif


        <table class="w-full table-fixed">
            <thead>
                <tr class="text-white bg-indigo-600">

                    <th class="px-4 py-2">Unidad Académica</th>
                    <th class="px-4 py-2">Carrera</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Dni</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Archivo</th>


                </tr>
            </thead>
            <tbody>
                @foreach($desmatriculacion as $desmat)
                <tr>

                             <td class="px-4 py-2 text-center">{{$desmat->academic->name}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->carrera->name}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->name}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->dni}}</td>
                             <td class="px-4 py-2 text-center">{{$desmat->email}}</td>

                             @if(isset($desmat->resource->name))
                             <td class="px-4 py-2 text-center">{{$desmat->resource->name}}</td>

                            @endif

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>





</div>
