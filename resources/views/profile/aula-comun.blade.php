<div class="grid grid-cols-2 mb-4 gap 2">

    <div class="form-group">
        <label for="academica" class="col-md-4 col-form-label text-md-right" id="">Unidad Academica </label>
        <div class="mb-4">
            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="academic_id" id="academic_id" wire:change='listarcarrera($event.target.value)'>
                <option value="">Seleccione Unidad Académica...</option>
                @foreach($academicas as $academic)
                <option value="{{$academic->id}}">{{$academic->name}}</option>

                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row ">
        <label for="carrera" class="col-md-4 col-form-label text-md-right" id="">Carreras</label>
        <div class="px-1 mb-4">
            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="carrera_id" id="carrera_id">
                <option value="">Seleccione Carrera...</option>
                @if($carreras)
                    @foreach($carreras as $carrera)
                        <option value="{{$carrera->id}}">{{$carrera->name}}</option>

                    @endforeach
                @endif
            </select>
        </div>
    </div>



    </div>

    <div class="mb-4">
        <label class="block mb-2 font-bold text-gray-700 text-md" for="name">Descripción del Aula</label>
        {!! Form::textarea('descripcion', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('descripcion')?
'border-red-600': '')]) !!}

        @error('descripcion')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
