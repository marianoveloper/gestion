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

<!--


    <div class="container py-8">

        <section class="py-8 " style="background-image: url({{asset('images/homes/barra-verde.png')}})">
            <h1 class="text-3xl text-center text-white">Solicitud de Apertura de Carrera</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información de la Propuesta</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'dev.courses.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}

                <div class="grid grid-cols-2 gap-2 mb-4 md:grid-cols-1">
                    <div>
                        {!! Form::label('status', 'Sede') !!}
                        {!! Form::select('status',['1'=>'San Juan','2'=>'San Luis', '3'=>'Mendoza'],
                        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>
                    <div>
                        {!! Form::label('category_id', 'Categoria') !!}
                        {!! Form::select('category_id',
                        ['1'=>'Licenciatura','2'=>'Tecnicatura','3'=>'Profesorado','4'=>'Maestría','5'=>'Carrera de
                        Grado'], null,
                        ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'])
                        !!}

                    </div>



                </div>
                <div class="grid grid-cols-2 gap-2 mb-4">
                    <div>
                        {!! Form::label('type_id', 'Unidad Académica') !!}
                        {!! Form::select('type_id',['1'=>'Facultad de Educación','2'=>'Facultad de Filosofía y
                        Humanidades','3'=>'Facultad de Ciencias Económicas','4'=>'Facaultad de Deecho y Cs.
                        Sociales','6'=>'Facultad de Cs. Médicas','7'=>'Facultad de Don Bosco','8'=>'Escuela de
                        Seguridad'] , null, ['class'=>'focus:ring-indigo-500
                        focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>
                    <div>
                        {!! Form::label('category_id', 'Seleccione la Carrera') !!}
                        {!! Form::select('category_id', ['1'=>'Profesorado','2'=>'Lic.Educación
                        Inclusiva','3'=>'Maestría','4'=>'Lic. en Actividad Física','5'=>'Lic. Gestión Deportiva'], null,
                        ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'])
                        !!}

                    </div>
                </div>
                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Datos de la Propuesta</h1>
                <hr class="mt-2 mb-6">


                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Presentación de la Propuesta </label>
                    {!! Form::textarea('description', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500
                    block w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('description')?
                    'border-red-600': '')]) !!}

                    @error('description')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Perfil del Egresado </label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Alcances e Incumbencias</label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Objetivos de la Propuesta</label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Duración de la Carrera</label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Destinatarios</label>
                    {!! Form::text('slug', null, [ 'class'=>'focus:ring-indigo-500
                    focus:border-indigo-500 block w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'.
                    ($errors->has('slug')? 'border-red-600': '')]) !!}

                    @error('slug')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Requisitos de Inscripción</label>
                    {!! Form::text('slug', null, [ 'class'=>'focus:ring-indigo-500
                    focus:border-indigo-500 block w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'.
                    ($errors->has('slug')? 'border-red-600': '')]) !!}

                    @error('slug')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <div>
                        <p class="mb-2 font-semibold text-md">
                           Adjuntar Plan de Estudio
                        </p>
                        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('file')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <div>
                        <p class="mb-2 font-semibold text-md">
                            Adjuntar Resolución Ministerial
                        </p>
                        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('file')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
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
                    {!! Form::submit('Crear nuevo Formulario', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>-->
        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

            <script src="{{asset('js/dev/courses/form.js')}}"></script>
            </x-slot-name>

</x-app-layout>
