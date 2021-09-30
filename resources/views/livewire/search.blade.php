<form class="relative pt-2 mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search"
        class="w-full h-10 px-5 pr-16 bg-white border-2 border-gray-300 rounded-lg text-md focus:outline-none"
        type="search" name="search" placeholder="¿Qué querés estudiar?">

    <button type="submit"
        class="absolute top-0 right-0 px-4 py-2 mt-2 font-bold bg-yellow-500 rounded hover:bg-yellow-700">
        <x-search size="21" color="white" />
    </button>
    @if($search)

        <ul class="absolute z-50 w-full mt-1 overflow-hidden bg-white rounded-lg z-50-left-0">
            @forelse($this->results as $result)
            <a href="{{route('courses.show',$result)}}">
                <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-gray-300">
                    {{$result->title}}
                </li></a>
            @empty
            <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-gray-300">No hay coincidencia</li>
            @endforelse
        </ul>


    @endif

</form>
