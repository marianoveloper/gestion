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
            <h1 class="text-3xl text-center text-white">Solicitud de Apertura de Carrera</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información de la Propuesta</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'carrera.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}

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
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        {!! Form::label('sede', 'Sede') !!}
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
                        {!! Form::label('subcategory_id', 'Seleccione la Categoría') !!}
                        {!! Form::select('subcategory_id', $subcategoria, null, ['class'=>'focus:ring-indigo-500
                        focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}

                    </div>

                    @error('subcategory_id')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Datos de la Propuesta</h1>
                <hr class="mt-2 mb-6">
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Título de la Carrera </label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Presentación de la Propuesta </label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="descripcion" id="descripcion" type="text" placeholder="Presentación de la Carrera"required></textarea>

                    @error('description')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Perfil del Egresado </label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="perfil" id="perfil" type="text" placeholder="Perfil del egresado"required></textarea>


                    @error('perfil')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Alcances e Incumbencias</label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="alcances" id="alcances" type="text" placeholder="Alcances e Incumbencias"required></textarea>

                    @error('alcances')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Objetivos de la Propuesta</label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="objetivos" id="objetivos" type="text" placeholder="Objetivos de la Propuesta"required></textarea>


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
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="destinatarios" id="destinatarios" type="text" placeholder="Destinatarios"required></textarea>


                    @error('slug')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Requisitos de Inscripción</label>
                    <textarea class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="requisitos" id="requisitos" type="text" placeholder="Requisitos de Inscripción"required></textarea>


                    @error('slug')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Adjuntar Plan de Estudio</h1>
                <hr class="mt-2 mb-6">
                <span>
                    A continuación se deberá adjuntar en formato Pdf
                </span>
                <div class="mt-4 mb-4">
                    <div>

                        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'pdf/*']) !!}
                        @error('file')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>
                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Adjuntar Resolución Ministerial</h1>
                <hr class="mt-2 mb-6">
                <span>
                    A continuación se deberá adjuntar en formato Pdf
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
      .create(document.querySelector('#descripcion'), {
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
      ClassicEditor
      .create(document.querySelector('#alcances'), {
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
      ClassicEditor
      .create(document.querySelector('#perfil'), {
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
