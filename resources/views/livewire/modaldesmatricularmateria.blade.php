<div class="fixed inset-0 z-10 overflow-y-auto duration-500 ease-out">
    <div class="flex justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block overflow-hidden text-left align-bottom transform bg-white rounded-lg shadow-xl transform-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form wire:submit.prevent="crear()" enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}" wire:model="user_id">

                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        {!! Form::label('Tipo de Matriculación', 'Tipo de Desmatriculación') !!}
                        {!! Form::select('tipo',['1'=>'Estudiantes','2'=>'Profesores','3'=>'Tutores','4'=>'Asesor Pedagógico','5'=>'Referente Virtual','6'=>'Coordinador','7'=>'Director'],
                        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
                        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
                    </div>

                    @error('tipo')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Nombre Y Apellido:</label>
                        <input type="text" class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" id="name" wire:model="name" required>
                    </div>
                    @error('name')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Dni:</label>
                        <input type="text" class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" id="dni" wire:model="dni">
                    </div>
                    @error('dni')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                    <div class="mb-4">
                        <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Email:</label>
                        <input type="text" class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" id="email" wire:model="email">
                    </div>
                    @error('email')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror

                    <div class="form-group">
                        <label for="academica" class="col-md-4 col-form-label text-md-right" id="">Unidad Academica </label>
                        <div class="mb-4">
                            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="academic_id" id="academic_id" wire:model="academic_id" wire:change='listarcarrera($event.target.value)'>
                                <option value="">Seleccione Unidad Académica...</option>
                                @foreach($academicas as $academic)
                                <option value="{{$academic->id}}">{{$academic->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        @error('academic_id')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group row ">
                        <label for="carrera" class="col-md-4 col-form-label text-md-right" id="">Carreras</label>
                        <div class="px-1 mb-4">
                            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="carrera_id" id="carrera_id" wire:model="carrera_id" wire:change='listarmateria($event.target.value)'>
                                <option value="">Seleccione Carrera...</option>
                                @if($carrera)
                                    @foreach($carrera as $car)
                                        <option value="{{$car->id}}">{{$car->name}}</option>

                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="carrera" class="col-md-4 col-form-label text-md-right" id="">Materias</label>
                        <div class="col-md-4">
                            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="materia_id" id="materia_id">
                                <option value="">Seleccione Materia...</option>
                                @if($materias)
                                    @foreach($materias as $materia)
                                        <option value="{{$materia->id}}">{{$materia->name}}</option>

                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-button-enlace class="mt-4 ml-3">
                        <svg wire:loading wire:target="crear" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <!--<button wire:click.prevent="crear()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-yellow-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">Guardar</button>-->
                            {{ __('Guardar') }}
                        </span>
                    </x-button-enlace>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="cerrarModal3()" type="button" class="inline-flex justify-center w-full px-4 py-2 mt-4 ml-3 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-gray-200 border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
                    </div>

                </div>

            </form>
        </div>
    </div>

</div>
