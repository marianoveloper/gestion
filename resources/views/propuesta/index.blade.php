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
            <h1 class="text-3xl text-center text-white">Solicitud de Apertura de Propuesta</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información de la Propuesta</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'propuesta.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}


                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        {!! Form::label('sede_id', 'Sede') !!}
                        {!! Form::select('sede_id', $sede, null, ['class'=>'focus:ring-indigo-500
                        focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>

                    @error('sede_id')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror


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
                        {!! Form::label('subcategory', 'Seleccione la Categoría') !!}

                        {!! Form::select('subcategory',['1'=>'Curso de Capacitación','2'=>'Curso de
                        Actualización','3'=>'Curso de Posgrado','4'=>'Diplomatura','5'=>'Maestría','6'=>'Doctorado'],
                        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>

                    @error('subcategory')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Datos de la Propuesta</h1>
                <hr class="mt-2 mb-6">
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Título de la Propuesta </label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>






                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Duración y Horas Acreditadas
                    </label>
                    {!! Form::text('duracion', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                    w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('duracion')? 'border-red-600':
                    '')]) !!}

                    @error('duracion')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>


                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Fecha de Inicio de Cursado</label>
                        <span>Indique la fecha estimada de inicio de la propuesta</span>
                        {!! Form::date('date_start',null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                        w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'.
                        ($errors->has('date_start')?
                        'border-red-600': '')]) !!}

                        @error('date_start')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>



                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Descripción de la Propuesta</h1>
                <hr class="mt-1 mb-3">
                    <h2>Breve presentación de la propuesta por parte del docente respondiendo al porqué y para qué de la propuesta</h2>


                    <div class="mt-4 mb-4">
                        <div>
                            <span>
                                Se deberá adjuntar en formato Pdf una breve presentación de la propuesta</span>
                                <hr class="mt-1 mb-3">
                            {!! Form::file('descripcion', ['class'=> 'form-input w-full'. ($errors->has('descripcion')?
                            'border-red-600':
                            ''),'id'=>'file','accept'=>'pdf/*']) !!}
                            @error('descripcion')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Programa de la Propuesta</h1>
                    <hr class="mt-1 mb-3">
                    <span>
                        En este apartado deberán subir adjunto el archivo PDF del programa de la propuesta virtual
                    </span>
                    <div class="mt-4 mb-4">
                        <div>

                            {!! Form::file('programa', ['class'=> 'form-input w-full'. ($errors->has('progrma')?
                            'border-red-600':
                            ''),'id'=>'file','accept'=>'pdf/*']) !!}
                            @error('programa')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Resolución de la Propuesta</h1>
                    <hr class="mt-2 mb-6">
                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Adjuntar tipo de Resolución(de unidad académica,Ministerio de educación, Coneau o Consejo Superior)</label>

                    </div>
                    <span>
                        En este apartado deberán subir adjunto el archivo PDF de la Resolución de la propuesta virtual
                    </span>
                    <div class="mt-4 mb-4">
                        <div>

                            {!! Form::file('resol', ['class'=> 'form-input w-full'. ($errors->has('resol')?
                            'border-red-600':
                            ''),'id'=>'file','accept'=>'pdf/*']) !!}
                            @error('resol')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>

                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Datos del/los Responsable/s de los Usuarios</h1>
                    <hr class="mt-2 mb-6">
                    <span class="px-1 ml-2 font-semibold">
                        <p><i class="fas fa-angle-double-right"></i> Nombre y Apellido completo</p>
                        <p> <i class="fas fa-angle-double-right"></i> Dni.</p>
                        <p><i class="fas fa-angle-double-right"></i> Email</p>
                        <p><i class="fas fa-angle-double-right"></i> Rol (Profesor,Tutor, Referente Virtual)</p>

                    </span>
                    <span class="mt-8 font-bold text-ml">
                        En este apartado deberán subir adjunto el archivo Excel
                    </span>
                    <div class="mt-4 mb-4">
                        <div>

                            {!! Form::file('usuario', ['class'=> 'form-input w-full'. ($errors->has('usuario')? 'border-red-600':
                            ''),'id'=>'file','accept'=>'pdf/*']) !!}
                            @error('usuario')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>

                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Certificado</h1>
                    <hr class="mt-2 mb-6">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Adjuntar link de google drive en donde se adjunten las fotos de la/s firma/s</label>
                    <span class="font-semibold">
                        <p><i class="fas fa-angle-double-right"></i> Nombre y Apellido completo</p>
                        <p> <i class="fas fa-angle-double-right"></i> Cargo del Responsable</p>
                    </span>
                    <div class="mt-4 mb-4">

                        {!! Form::text('certificado', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                        w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('certificado')? 'border-red-600': '')])
                        !!}

                        @error('certificado')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>


                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Flyer (opcional en caso de ser necesario)</h1>
                    <hr class="mt-2 mb-6">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Adjuntar link de google drive en donde se adjunten los logos para ser incorporados al FLYER</label>

                    <div class="mt-4 mb-4">

                        {!! Form::text('flyer', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                        w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('flyer')? 'border-red-600': '')])
                        !!}

                        @error('flyer')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="flex justify-center py-8">
                        {!! Form::submit('Enviar nuevo Formulario', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>


        @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#objetivos'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                        'blockQuote'],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        </script>
        @endpush

</x-app-layout>
