<div class="grid grid-cols-3 mb-4 gap 2">

    <div class="form-group">
        <label for="academica" class="col-md-4 col-form-label text-md-right" id="">Unidad Académica </label>
        <div class="mb-4">
            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="academic_id" id="academic_id" wire:change='listarpropuesta($event.target.value)'>
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
    <div class="form-group">
        <label for="carrera" class="col-md-4 col-form-label text-md-right" id="">Propuestas</label>
        <div class="col-md-4">
            <select class="block w-full pr-12 mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm" name="propuesta_id" id="propuesta_id">
                <option value="">Seleccione Propuesta...</option>
                @if($propuestas)
                    @foreach($propuestas as $propuesta)
                        <option value="{{$propuesta->id}}">{{$propuesta->name}}</option>

                    @endforeach
                @endif
            </select>
        </div>
        @error('propuesta_id')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>

    </div>
