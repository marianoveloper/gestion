<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uccuyo Educación Virtual') }}</title>
    <link href="{{asset('images/logos/icono2.png')}}" rel="shortcut icon" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">-->
    <link rel="stylesheet" href="{{asset('vendor\fontawesome-free\css\all.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css"
        integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @laravelPWA
    <!-- Scripts -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178248540-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-178248540-1');

    </script>

    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/03221c46fa.js" crossorigin="anonymous"></script>
    {{-- aqui incluyo iconos de fontawesome --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">

        <!------------------nav----------------------------------------->

        @php
        $links = [
        [
        'title' => 'Dashboard',
        'url' => route('solicitudes.dashboard'),
        'active' => request()->routeIs('solicitudes.dashboard'),
        'icon' => 'fa-solid fa-gauge-high',
        ],
        [
            'title'=>'Matriculación',
            'url'=> route('solicitudes.matriculacion.index'),
            'active' => request()->routeIs('solicitudes.matriculacion.index'),
            'icon' => 'fa-solid fa-gauge-high',
        ],



        ];
        @endphp

        <div class="flex" x-data="{ open: false, openSidebar: true }">
            <div :class="{ 'lg:block': openSidebar, }" class="flex-shrink-0 hidden w-64 lg:block">
                {{-- aqui se utilizo Alpine.js --}}
                @include('layouts.partials.solicitudes.sidebar'){{-- aqui incluyo el sidebar que esta en sidebar.blade.php --}}
            </div>

            <div class="w-full ">
                @include('layouts.partials.solicitudes.navigation'){{-- aqui incluyo el menu de navegacion que esta en navigation.blade.php --}}


                <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $slot }}{{-- Aqui va el texto dinamico que coloco en dashboard.blade.php que esta dentro de la carpeta admin --}}
                </div>
            </div>


        </div>


        <!--------------------------nav---------------------------------->
        <!--Page Heading-->


        <!-- Page Content -->

    </div>
    <x-footer />
    @stack('modals')

    @livewireScripts

    <script>
        Livewire.on('alert', function (message) {
            Swal.fire(
                'Uccuyo Virtual',

                message,
                'success'
            )
        });

    </script>
    <script>
        Livewire.on('alert2', function (message) {
            Swal.fire(
                'Uccuyo Virtual',

                message,
                'error'
            )
        });

    </script>
    @stack('js')
    @isset($js)
    {{$js}}

    @endisset

</body>


</html>
