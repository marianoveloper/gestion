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
            <h1 class="text-3xl text-center text-white">Desmatriculación de Propuestas</h1>


        </section>
        <div class="card">
            <div class="card-body">


                <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Información de la Propuesta</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'desmatriculacion-propuestas.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}


                @livewire('desmatriculacion-propuestas')
                <div class="form-group">
                    <label for="tipo" class="col-md-4 col-form-label text-md-right" id="">Tipo de Desmatriculación </label>
                    <div class="mb-4">
                        <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="tipo" id="tipo">
                            <option value="">Seleccione Tipo...</option>
                            <option value="1">Estudiante</option>
                            <option value="2">Profesor</option>
                            <option value="3">Asesor Pedagógico</option>

                        </select>
                    </div>

                @error('tipo')
                <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror

                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Desmatriculación por Alumno </h1>
    <hr class="mt-2 mb-6">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">


                    <div class="mb-4">
                        <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Nombre Y Apellido:</label>
                        <input type="text" class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="name" id="name" >
                    </div>
                    @error('name')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Dni:</label>
                        <input type="text" class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" id="dni" name="dni">
                    </div>
                    @error('dni')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Email:</label>
                        <input type="text" class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" id="email" name="email">
                    </div>
                    @error('email')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror




                </div>

                <h1 class="mt-8 text-2xl font-bold text-center bg-green-200">Desmatriculación por Excel (opcional)</h1>
                <hr class="mt-2 mb-6">



                <div class="mt-4 mb-4">
                    <figure class="flex justify-center">
                        @isset($course->image)
                        <img id="picture" class="object-cover object-center w-full h-64" src="#">
                        @else
                        <img id="picture" class="object-cover object-center w-auto h-30 "
                            src="{{asset('images/homes/modelopropuesta.jpg')}}">
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
