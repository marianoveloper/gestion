<div class="mb-4">
    {!! Form::label('title', 'Título del Formulario') !!}
    {!! Form::text('title', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('title')? 'border-red-600':
    '')]) !!}

    @error('title')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del Formulario') !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly', 'class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
    sm:text-sm border-gray-300 rounded-md mt-1'.
    ($errors->has('slug')? 'border-red-600': '')]) !!}

    @error('slug')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
    sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('description')?
    'border-red-600': '')]) !!}

    @error('description')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-4 gap-4">
    <div >
        {!! Form::label('link_form', 'url de Formulario') !!}
        {!! Form::text('link_form', null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
        sm:text-sm border-gray-300 rounded-md mt-1'. ($errors->has('link_form')? 'border-red-600': '')]) !!}

        @error('link_form')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
    <div>
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
        sm:text-sm border-gray-300 rounded-md mt-1'])
        !!}

    </div>
    <div>
        {!! Form::label('type_id', 'Subcategoria') !!}
        {!! Form::select('type_id', $types, null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
    </div>
    <div>
        {!! Form::label('status', 'Estado') !!}
        {!! Form::select('status',['1'=>'Activo','2'=>'Borrador'],
        null, ['class'=>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12
        sm:text-sm border-gray-300 rounded-md mt-1']) !!}
    </div>

</div>

<h1 class="mt-8 mb-2 text-2xl font-bold">Imagen del Formulario</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
        <img id="picture" class="object-cover object-center w-full h-64"
            src="{{ url('storage/'.$course->image->url) }}">
        @else
        <img id="picture" class="object-cover object-center w-full h-64" src="{{asset('images/homes/curso.png')}}">
        @endisset
    </figure>
    <div>
        <p class="mb-2">
            Cargar imagen las medidas son 330x250 en formato .png
        </p>
        {!! Form::file('file', ['class'=> 'form-input w-full'. ($errors->has('file')? 'border-red-600':
        ''),'id'=>'file','accept'=>'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
</div>
