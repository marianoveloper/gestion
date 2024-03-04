<div>
    <div class="container">
        <h1 class="mt-6 text-2xl font-bold text-center bg-green-200">Cargar Candidato</h1>
        <hr class="mt-2 mb-6">

        <form action="{{route('sala.candidato.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="academica" class="col-md-4 col-form-label text-md-right" id="">Nombre del Alumno</label>
                <input id="name" name="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-3">
                <label for="academica" class="col-md-4 col-form-label text-md-right" id="">Apellido del Alumno</label>
                <input id="last_name" name="last_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-3">
                <label for="academica" class="col-md-4 col-form-label text-md-right" id="">Email</label>
                <input id="email" name="email" type="email"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-3">
                <label for="academica" class="col-md-4 col-form-label text-md-right" id="">DNI</label>
                <input id="dni" name="dni" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('sala.candidato.index') }}" class="flex-shrink-0 border-orange-300 border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded">Regresar</a>

        </form>
</div>
