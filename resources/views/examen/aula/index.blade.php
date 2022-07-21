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
            <h1 class="text-3xl text-center text-white">Examen Final</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información del Aula</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'matriculacion.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}


                <div class="grid grid-cols-3 gap-3 mb-4">
                    <div class="mb-4">
                        {!! Form::label('Condicion', 'Condición') !!}
                        {!! Form::select('condicion',['1'=>'Regular','2'=>'Libre','3'=>'Regular y Libre'],
                        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>

                    @error('condicion')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        {!! Form::label('date_start', 'Fecha del Examen:') !!}
                        {!! Form::date('date_start',null, ['class'=>'class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm'.
                        ($errors->has('date_start')?
                        'border-red-600': '')]) !!}

                        @error('date_start')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>


                </div>



                @livewire('matriculacion-examen')

                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Modelo Excel de Matriculación</h1>
                <hr class="mt-2 mb-6">
                <span>
                    El o los archivo/s debe/n ser obtenido/s de SIUCC o Guaraní.
                    La planilla debe contener los campos correctamente ordenados y completados: el DNI no debe contener

                </span>


                <div class="mt-4 mb-4">
                    <figure>
                        @isset($course->image)
                        <img id="picture" class="object-cover object-center w-full h-64" src="#">
                        @else
                        <img id="picture" class="object-cover object-center w-full h-58"
                            src="{{asset('images/homes/matriculacion.png')}}">
                        @endisset
                    </figure>

                </div>
                <div class="mb-4">
                    <div>
                        <p class="mb-2 text-xl font-semibold">
                            Cargar de archivo en Formato Excel
                        </p>
                        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'xls/*']) !!}
                        @error('file')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center py-8">
                    {!! Form::submit('Enviar Formulario', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

            <script src="{{asset('js/dev/courses/form.js')}}"></script>
            </x-slot-name>

</x-app-layout>
