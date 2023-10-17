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
            <h1 class="text-3xl text-center text-white">Registro de Incidente</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Datos del Solicitante</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'propuesta.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Nombre y Apellido </label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>

                <div class="grid grid-cols-3 gap-4 mb-4">


                </div>
                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Datos del Incidente</h1>
                <hr class="mt-2 mb-6">



            <div class="mb-4">
                {!! Form::label('subcategory', 'Seleccione tipo de Incidente') !!}

                {!! Form::select('subcategory',['1'=>'matriculacion','2'=>'Desmatriculacion','3'=>'Mesa de examen','4'=>'cambio de clave'],
                null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                sm:text-sm border-gray-300 rounded-md mt-1']) !!}
            </div>

            @error('subcategory')
            <strong class="text-xs text-red-600">{{$message}}</strong>
            @enderror
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Asunto </label>
                    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full
                    pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
                    '')]) !!}

                    @error('title')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>



                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Detalle</label>
                    {!! Form::textarea('objetivos', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block
                    w-full pl-7 pr-12
                    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('objetivos')?
                    'border-red-600': '')]) !!}


                    @error('objetivos')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>



                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200"> Imagen del incidente</h1>
                <hr class="mt-2 mb-6">
                <div class="mb-4">
                    <div>
                        <p class="mb-2 text-xl font-semibold">
                            Cargar Imagen en Formato jpg/png
                        </p>
                        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
                        ''),'id'=>'file','accept'=>'xls/*']) !!}
                        @error('file')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                </div>

</x-app-layout>
