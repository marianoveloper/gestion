<section>
    <h2 class="text-2xl font-bold">Resoluciones </h2>
    <hr class="mt-2 mb-6">

    @foreach ($course->resolutions as $item)
    <article>
        <div class="bg-gray-100 card-body">
            @if($resolution->id==$item->id)
                <form wire:submit.prevent="update">
                    <input wire:model="resolution.name" class="w-full form-input">

                    @error('resolution.name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </form>
            @else
            <header class="flex justify-between">
                <h1>{{$item->name}}</h1>
                <div>
                    <i wire:click="edit({{$item}})"class="text-blue-500 cursor-pointer fas fa-edit"></i>
                    <i wire:click="destroy({{$item}})" class="ml-2 text-red-500 cursor-pointer fas fa-trash"></i>

                </div>

            </header>

        @endif
        </div>
    </article>
    @endforeach

    <article class="card">
        <div class="bg-gray-100 card-body">
            <form wire:submit.prevent="store">
                <input wire:model="name" class="w-full form-input" placeholder="Agregar resolución">

                @error('name')
                <span class="text-xs text-red-500">{{$message}}</span>

                @enderror

                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Agregar Resolución</button>
                </div>
            </form>


        </div>
    </article>
</section>

