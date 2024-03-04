<nav x-data="{ open: false }" class="bg-green-600 border-b border-green-500 shadow ">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!--Hamburger Menu Large Screen-->
            <div class="items-center hidden -mr-2 lg:flex">
                <button @click="openSidebar = ! openSidebar"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="flex inline -" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        {{-- <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /> --}}
                    </svg>
                </button>
            </div>

            <div class="flex lg:hidden">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{route('sala.candidato.index')}}">
                        <x-jet-application-mark class="block w-auto h-9" />
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex sm:items-center sm:ml-6">

                @auth

                    <!-- Settings Dropdown -->
                    <div class="relative ml-3">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                   <!-- Account Management -->
                                   <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                   :active="request()->routeIs('profile.show')">
                                   {{ __('Perfil') }}
                               </x-jet-responsive-nav-link>

                               @can('Leer cursos')
                               <x-jet-responsive-nav-link href="{{ route('dev.courses.index') }}"
                                   :active="request()->routeIs('dev.courses.index')">
                                   {{ __('Dev') }}
                               </x-jet-responsive-nav-link>

                               @endcan

                               @can('Ver dashboard')
                               <x-jet-responsive-nav-link href="{{ route('admin.home') }}"
                                   :active="request()->routeIs('admin.home')">
                                   {{ __('Administrador') }}
                               </x-jet-responsive-nav-link>
                               @endcan


                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @else
                    @if (Route::has('login'))
                        <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                            @auth
                                <a href="{{ route('/dashboard') }}"
                                    class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                @endauth
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">

            @foreach ($links as $link)
                <x-jet-responsive-nav-link href="{{ $link['url'] }}" :active="$link['active']">
                    {{ $link['title'] }}
                </x-jet-responsive-nav-link>
            @endforeach


            @guest

                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Log in') }}
                </x-jet-responsive-nav-link>


            @endguest
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="mr-3 shrink-0">
                            <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>


            </div>
        @endauth
    </div>
</nav>
