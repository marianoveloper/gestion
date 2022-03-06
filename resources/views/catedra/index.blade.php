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
            <h1 class="text-3xl text-center text-white">Solicitud de Apertura de Cátedra</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información de la Propuesta</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'catedra.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}

                <div class="grid grid-cols-2 gap-2 mb-4">
                    <div>
                        {!! Form::label('academic_id', 'Unidad Académica') !!}
                        {!! Form::select('academic_id', $academica, null, ['class'=>'focus:ring-indigo-500
                        focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>
                    @error('academic_id')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div>
                        {!! Form::label('carrera_id', 'Seleccione la Carrera') !!}
                        {!! Form::select('carrera_id', $carrera, null, ['class'=>'focus:ring-indigo-500
                        focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}

                    </div>

                    @error('carrera_id')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>



                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Contacto del Coordinador o
                        Director de la carrera: Apellido, Nombre, DNI, Mail de coordinador o director, Teléfono de
                        contacto (para uso interno)</label>
                    {!! Form::text('contacto', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                    w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('contacto')? 'border-red-600':
                    '')]) !!}

                    @error('contacto')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>




                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Espacios Virtuales</h1>
                <hr class="mt-2 mb-6">
                <span>
                    A continuación se deberá adjuntar en formato Excel, contemplando la duración de la carrera, cada año
                    por hoja. En este archivo se debe detallar Nombre de la Asignatura (según plan de estudios), a que
                    año y semestre corresponde, docentes a cargo (nombre, apellido, DNI, correo) - VER IMAGEN A
                    CONTINUACIÓN COMO REFERENCIA.
                </span>
                <h4 class="mt-8 mb-2 text-2xl font-bold text-center">Modelo Excel Solicitud de Apertura Espacios
                    Virtuales</h4>

                <div class="mb-4">
                    <figure>
                        @isset($course->image)
                        <img id="picture" class="object-cover object-center w-full h-64" src="#">
                        @else
                        <img id="picture" class="object-cover object-center w-full h-58"
                            src="{{asset('images/homes/modelo.png')}}">
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
                    {!! Form::submit('Enviar nuevo Formulario', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

            <script src="{{asset('js/dev/courses/form.js')}}"></script>
            </x-slot-name>

</x-app-layout>
