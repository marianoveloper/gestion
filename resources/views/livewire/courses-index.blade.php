<div>
    <div class="py-4 mb-16 bg-gray-200">
        <div class="flex px-4 mx-auto max-w-7xl sm-px-6 lg:px-8">
            <button wire:click="resetFilters" class="h-12 px-4 mr-4 text-gray-700 bg-white rounded-lg shadow focus:outline-none">

                <i class="mr-2 text-xs fas fa-archway"></i>
                Todos los cursos
            </button>
            <!-- component -->

            <!-- Dropdown tipo-->
            <div class="relative mr-4" x-data="{open:false}">
                <button
                    class="block h-12 px-4 overflow-hidden text-gray-700 bg-white rounded-lg shadow focus:outline-none"
                    x-on:click="open = !open">
                    <i class="ml-2 text-sm fas fa-tags"></i>
                    Categoría
                    <i class="ml-2 text-sm fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 py-2 mt-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">

                    @foreach ($categories as $category )
                    <a class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-yellow-500 hover:text-white" wire:click="$set('category_id',{{$category->id}})" x-on:click="open = false">{{$category->name}}</a>

                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown categoria -->
            <div class="relative mr-4" x-data="{open:false}">
                <button
                    class="block h-12 px-4 overflow-hidden text-gray-700 bg-white rounded-lg shadow focus:outline-none"
                    x-on:click="open = !open">
                    <i class="ml-2 text-sm fas fa-tags"></i>
                   Subcategoría
                    <i class="ml-2 text-sm fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 py-2 mt-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach ($types as $type )
                    <a
                    class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-yellow-500 hover:text-white" wire:click="$set('type_id',{{$type->id}})" x-on:click="open = false">{{$type->name}}</a>
                    @endforeach

                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->



        </div>
    </div>

    <div class="grid mx-auto mt-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8 gap-x-6 gap-y-8">
        @forelse($courses as $course)
            <x-course-card :course="$course"/>
            @empty
            <li class="md:col-span-2 lg:col-span-4">
                <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <strong class="font-bold">Upss!</strong>
                    <span class="block sm:inline">Actualmente no disponemos de propuestas que coincidan con su selección.</span>

                </div>
            </li>


        @endforelse

    </div>

 <div class="px-4 mx-auto mt-8 mb-16 max-w-7xl sm:px-6 lg:px-8">

        {{$courses->links()}}
    </div>

</div>
