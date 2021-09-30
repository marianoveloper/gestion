<x-app-layout>
    <div class="container py-8">
        .<div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">Nuevo Curso</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=> 'dev.courses.store','files'=>true, 'autocomplete'=>'off']) !!}

                {!! Form::hidden('user_id',auth()->user()->id) !!}
                @include('dev.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Crear nuevo curso', ['class'=> 'btn btn-primary cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

        <script src="{{asset('js/dev/courses/form.js')}}"></script>
        </x-slot-name>
</x-app-layout>
