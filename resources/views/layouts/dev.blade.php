<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
       <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">-->
        <link rel="stylesheet" href="{{asset('vendor\fontawesome-free\css\all.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

           <!--Page Heading-->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <div class="container grid grid-cols-5 gap-6 py-8">
                <aside>
                    <h1 class="mb-4 text-lg font-bold">Edición del Curso</h1>
                    <ul class="text-sm text-gray-600">
                        <li class="pl-2 mb-1 leading-7 border-l-4 @routeIs('dev.courses.edit',$course) border-indigo-400 @else border-transparent  @endif"><a href="{{route('dev.courses.edit',$course)}}">Información del Curso</a></li>

                        <li class="pl-2 mb-1 leading-7 border-l-4 @routeIs('dev.courses.goals',$course) border-indigo-400 @else border-transparent  @endif "><a href="{{route('dev.courses.goals',$course)}}">Objetivos</a></li>

                    </ul>





                    @switch($course->status)
                    @case(1)
                    <form action="{{route('dev.courses.status',$course)}}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger">Solicitar Revisión</button>
                    </form>
                  @break
                 @case(2)
                 <div class="card">
                     <div class="text-yellow-800 bg-yellow-100 card-body ">

                            Este curso se encuentra en Revisión

                     </div>
                 </div>

                 @break
                 @case(3)
                 <div class="card">
                    <div class="text-green-800 bg-green-100 card-body">

                           Este curso se encuentra Publicado

                    </div>
                </div>
                 @break
                 @default

             @endswitch

                </aside>

                <div class="col-span-4 card">
                    <main class="text-gray-600 card-body">
                        {{$slot}}
                    </main>
                </div>
            </div>

        </div>
        <x-footer/>
        @stack('modals')

        @livewireScripts

        @isset($js)
        {{$js}}

        @endisset

    </body>


</html>
