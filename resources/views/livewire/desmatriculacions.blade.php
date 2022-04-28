<div class="py-12">

<div class="mx-auto max-w-7xl sm:px6 lg:px8">
    <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">

        @if(session()->has('message'))
        <div class="px-4 py-4 my-3 text-teal-900 bg-teal-100 rounded-b shadow-md" role="alert">
            <div class="flex">
                <div>
                    <h4>{{ session('message')}}</h4>
                </div>
            </div>
        </div>
    @endif


        <button wire:click="desmatricular()" class="px-4 py-2 my-3 font-bold text-white bg-green-500">Agregar Desmatriculación</button>
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
