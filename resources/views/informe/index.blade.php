<x-app-layout>
    <div>

        <div class="text-center">
            @if (session('info'))
            <a href="/"
                class="items-center w-full px-4 py-3 text-sm font-bold text-center text-white bg-yellow-500 rounded hover:bg-yellow-700">{{session('info')}}!
                Volver al Menu</a>
            @endif

        </div>


    </div>




    <div class="container py-8">

        <section class="py-8 " style="background-image: url({{asset('images/homes/barra-verde.png')}})">
            <h1 class="text-3xl text-center text-white">Solicitud de Informes</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200"></h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'informe.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}
                {!! Form::hidden('hora',Carbon\Carbon::now()->format('H:i') )!!}



                @livewire('informe')
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="mb-4">
                        {!! Form::label('Semestre', 'Semestre') !!}
                        {!! Form::select('semestre',['1'=>'1º Semestre','2'=>'2º Semestre','3'=>'1ºy2º Semestre'],
                        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>

                    @error('semestre')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        {!! Form::label('autoridad', 'Informe destinado a:') !!}
                        {!! Form::select('autoridad',['1'=>'Decano','2'=>'Secretario Académico','3'=>'Decano y Secretario Académico'],
                        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>

                    @error('semestre')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Especificar las materias que deben incluir en el informe (escribir todas si son las que se van a tener en cuenta) </label>
                    {!! Form::textarea('descripcion', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('descripcion')?
    'border-red-600': '')]) !!}

                    @error('descripcion')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="flex justify-center py-8">
                    {!! Form::submit('Solicitar Pedido de Informe', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

            <script src="{{asset('js/dev/courses/form.js')}}"></script>
            </x-slot-name>

</x-app-layout>
