<aside id="default-sidebar"
    class="{{-- fixed top-0 left-0 z-40 --}} sticky top-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-600 dark:bg-gray-800">
        <h2 class="mb-6 text-3xl font-semibold text-green-900 dark:text-green-950"><a href="/"> <img  class="block w-auto h-9" src={{asset('images/logos/icono4.png')}}></a>
        </h2>
        <ul class="space-y-2">


            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['url'] }}"
                        class="flex items-center p-2 text-base font-normal text-gray-100 rounded-lg hover:bg-gray-700 {{ $link['active'] ? 'bg-gray-700' : '' }}">
                        <span style="color: green" class="w-6 h-6 text-gray-500">
                            <i class="{{ $link['icon'] }}"></i>
                                </span>
                        <span class="ml-3">{{ $link['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
