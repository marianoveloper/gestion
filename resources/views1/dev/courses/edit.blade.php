<x-dev-layout :course="$course">



    <h1 class="text-2xl font-bold">Información del curso</h1>

    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route'=>['dev.courses.update',$course],'method'=>'put','files'=> true]) !!}
    @include('dev.partials.form')

    <div class="flex justify-end">
        {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

        <script src="{{asset('js/dev/courses/form.js')}}"></script>
        </x-slot-name>
</x-dev-layout>
