<div class="container py-2">

    <div class="mb-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between px-6 py-2">
            <h1 class="font-semibold text-gray-700 uppercase">{{$category->name}}</h1>

            <div class="grid grid-cols-2 text-gray-500 border border-gray-200 divide-x divide-gray-200">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-yellow-600' : ''}}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-yellow-600' : ''}}"
                    wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
        <aside>
            <h2 class="mb-2 font-semibold text-center">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">

                @foreach($category->types as $subcategory)
                <li class="py-2 text-sm ">
                    <a class="capitalize cursor-pointer hover:text-yellow-600 {{$subcategoria==$subcategory->slug ? 'text-yellow-500 font-semibold' : ''}}"
                        wire:click="$set('subcategoria','{{$subcategory->slug}}')">{{$subcategory->name}}
                    </a>
                </li>

                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar Filtro
            </x-jet-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if($view=='grid')

            <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($courses as $course)
                <x-course-filter :course="$course" />
                @empty
                <li class="md:col-span-2 lg:col-span-4">
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Upss!</strong>
                        <span class="block sm:inline">Actualmente no disponemos de propuestas que coincidan con su selección.</span>
                    </div>
                </li>
                @endforelse

            </ul>
            @else
            <ul>
                @forelse($courses as $course)
                <x-course-list :course="$course" />
                @empty
                <li class="md:col-span-2 lg:col-span-4">
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Upss!</strong>
                        <span class="block sm:inline">No existe ningún curso con ese filtro.</span>
                    </div>
                </li>
                @endforelse
            </ul>
            @endif
            <div class="mt-4">
                {{$courses->links()}}
            </div>
        </div>

    </div>

</div>

