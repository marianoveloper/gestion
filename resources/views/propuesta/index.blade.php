<x-app-layout>
    <div>

            <div class="text-center">
                @if (session('info'))
                    <a href="/" class="items-center w-full px-4 py-3 text-sm font-bold text-center text-white bg-yellow-500 rounded hover:bg-yellow-700">{{session('info')}}! Volver al Menu</a>
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

                {!! Form::open(['route'=> 'carrera.store','files'=>true, 'autocomplete'=>'off']) !!}

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
                        {!! Form::label('subcategoria_id', 'Seleccione la Categoría') !!}
                        {!! Form::select('subcategoria_id', $subcategoria, null, ['class'=>'focus:ring-indigo-500
                        focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}

                    </div>

                    @error('subcategoria_id')
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
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Objetivos de la Propuesta</label>
                    {!! Form::textarea('objetivos', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('objetivos')?
    'border-red-600': '')]) !!}


                    @error('objetivos')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Destinatarios</label>
                    {!! Form::textarea('destinatarios', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('destinatarios')?
                    'border-red-600': '')]) !!}
                    @error('destinatarios')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Requisitos de Inscripción</label>
                    {!! Form::textarea('requisitos', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('requisitos')?
                    'border-red-600': '')]) !!}


                    @error('requisitos')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Duración y Horas Acreditadas </label>
                    {!! Form::text('duracion', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('duracion')? 'border-red-600':
                    '')]) !!}

                    @error('duracion')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        {!! Form::label('cupo', 'Cupo Mínimo ') !!}
                        {!! Form::text('cupo', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('cupo')?
                        'border-red-600': '')]) !!}

                        @error('cupo')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('date_start', 'Fecha de Inicio del Curso') !!}
                        {!! Form::date('date_start',null, ['class'=>'form-input block w-full mt-1'. ($errors->has('date_start')?
                        'border-red-600': '')]) !!}

                        @error('date_start')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        {!! Form::label('costo', 'Costo y Forma de Pago ') !!}
                        {!! Form::text('costo', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('costo')?
                        'border-red-600': '')]) !!}

                        @error('costo')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('link_pago', 'Link de Pago/Form de Preinscripción') !!}
                        {!! Form::text('link_pago', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('link_pago')? 'border-red-600': '')]) !!}

                        @error('link_pago')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Descripción Propuesta</h1>
                <hr class="mt-2 mb-6">
                <span>
                    A continuación se deberá adjuntar en formato Pdf una breve presentación de la propuesta
                <div class="mt-4 mb-4">
                    <div>

                        {!! Form::file('descripcion', ['class'=> 'form-input w-full'. ($errors->has('descripcion')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('descripcion')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Adjuntar Programa de la Propuesta</h1>
                <hr class="mt-2 mb-6">
                <span>
                    En este apartado deberán subir adjunto el archivo PDF del programa de la propuesta virtual
                </span>
                <div class="mt-4 mb-4">
                    <div>

                        {!! Form::file('programa', ['class'=> 'form-input w-full'. ($errors->has('progrma')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('file')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Adjuntar Resolución Ministerial</h1>
                <hr class="mt-2 mb-6">
                <div class="mb-4">
                    {!! Form::label('tipo_resol', 'N° y Tipo Resolución (de unidad académica,Ministerio de Educación, CONEAU o Consejo Superior)  ') !!}
                    {!! Form::text('tipo_resol', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('tipo_resol')?
                    'border-red-600': '')]) !!}

                    @error('tipo_resol')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <span>
                     En este apartado deberán subir adjunto el archivo PDF del programa de la propuesta virtual
                </span>
                <div class="mt-4 mb-4">
                    <div>

                        {!! Form::file('resol', ['class'=> 'form-input w-full'. ($errors->has('resol')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('resol')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>

                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Datos del/los Responsable/s del Proyecto -Resumen de CV</h1>
                <hr class="mt-2 mb-6">
                <span class="px-1 ml-2 font-semibold">
                    <p><i class="fas fa-angle-double-right"></i> Nombre y Apellido completo</p>
                    <p> <i class="fas fa-angle-double-right"></i>Título de grado y posgrado e institución donde las realizó.</p>
                    <p><i class="fas fa-angle-double-right"></i> Descripción de la principal actividad  actual.</p>
                    <p><i class="fas fa-angle-double-right"></i>De realizar otras actividades  a parte de la principal por favor mencionarlas. (principalmente si tienen que ver  con respecto a docencia virtual.)</p>
                    <p><i class="fas fa-angle-double-right"></i>Principales actividades desarrolladas anteriormente, enumeradas de forma general (experiencia laboral)</p>
                    <p><i class="fas fa-angle-double-right"></i> Enumerar las organizaciones en las que trabaja en la ACTUALIDAD.</p>

                    <p><i class="fas fa-angle-double-right"></i>POR FAVOR COLOCAR UNA FOTO  PROFESIONAL E INDIVIDUAL (Tener en cuenta que este resumen será presentado ante la institución)</p>


                </span>
                <span class="mt-8 text-xl font-bold">
                     En este apartado deberán subir adjunto el archivo PDF resumen de cv
                </span>
                <div class="mt-4 mb-4">
                    <div>

                        {!! Form::file('cv', ['class'=> 'form-input w-full'. ($errors->has('cv')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('resol')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>


                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Flyer (opcional)</h1>
                <hr class="mt-2 mb-6">

                <div class="grid grid-cols-2 gap-4">
                    <figure>
                        @isset($propuesta->image)
                        <img id="picture" class="object-scale-down object-center w-20 h-20 "
                            src="{{ url('storage/'.$propuesta->image->url) }}">
                        @else
                        <img id="picture" class="object-scale-down object-center w-full h-20" src="{{asset('images/logos/icono3.png')}}">
                        @endisset
                    </figure>
                    <div>
                        <p class="mb-2">
                            Adjuntar logos que deben ser incorporados al flyer en formato .png

                        </p>
                        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'image/*']) !!}
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


            @push('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

            <script>
  ClassicEditor
      .create(document.querySelector('#objetivos'), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
      })
      .catch(error => {
          console.log(error);
      });




            </script>
            @endpush

</x-app-layout>
