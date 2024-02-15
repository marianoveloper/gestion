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
            <h1 class="text-3xl text-center text-white">Solicitud de Certificado</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información de la Propuesta</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'propuesta.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}


                    @livewire('certificado')

                <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Firma 1</h1>
                <hr class="mt-1 mb-3">

                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Indique Nombre y Apellido del Responsable</label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Cargo que ocupa </label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>



                    <div class="mt-4 mb-4">
                        <div>
                            <span>
                                Se deberá adjuntar una imagen en formato PNG la firma</span>
                                <hr class="mt-1 mb-3">
                            {!! Form::file('firma1', ['class'=> 'form-input w-full'. ($errors->has('firma1')?
                            'border-red-600':
                            ''),'id'=>'file','accept'=>'png']) !!}
                            @error('descripcion')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Firma 2 (opcional)</h1>
                    <hr class="mt-1 mb-3">
                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Indique Nombre y Apellido del Responsable</label>
                        {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                        pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                        '')]) !!}

                        @error('title')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Cargo que ocupa </label>
                        {!! Form::text('cargo2', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                        pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('compos')? 'border-red-600':
                        '')]) !!}

                        @error('title')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>



                        <div class="mt-4 mb-4">
                            <div>
                                <span>
                                    Se deberá adjuntar una imagen en formato PNG la firma</span>
                                    <hr class="mt-1 mb-3">
                                {!! Form::file('firma2', ['class'=> 'form-input w-full'. ($errors->has('firma2')?
                                'border-red-600':
                                ''),'id'=>'file','accept'=>'png']) !!}
                                @error('firma2')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Firma 3 (opcional)</h1>
                    <hr class="mt-2 mb-6">
                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Indique Nombre y Apellido del Responsable</label>
                        {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                        pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                        '')]) !!}

                        @error('title')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Cargo que ocupa </label>
                        {!! Form::text('cargo2', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                        pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('compos')? 'border-red-600':
                        '')]) !!}

                        @error('title')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>



                        <div class="mt-4 mb-4">
                            <div>
                                <span>
                                    Se deberá adjuntar una imagen en formato PNG la firma</span>
                                    <hr class="mt-1 mb-3">
                                {!! Form::file('firma3', ['class'=> 'form-input w-full'. ($errors->has('firma3')?
                                'border-red-600':
                                ''),'id'=>'file','accept'=>'png']) !!}
                                @error('firma3')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>



                    <h1 class="mt-8 text-xl font-bold text-center bg-green-200">Requisitos de obtención del Certificado </h1>
                    <hr class="mt-2 mb-6">
                    <span class="font-semibold"> En caso de requerir el cumplimiento/realización de una actividad o recurso dentro del curso para la obtención del certificado detallar nombre de la actividad, tal cual se encuentra en curso (Detallar calificación o solo realización de la misma)</span>
                    <hr class="mt-2 mb-6">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Descripción general </label>

                    <div class="mt-4 mb-4">

                        {!! Form::textarea('requisito', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                        w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('requisito')? 'border-red-600': '')])
                        !!}

                        @error('requisito')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="flex justify-center py-8">
                        {!! Form::submit('Enviar Formulario', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>


        @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#requisito'), {
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
