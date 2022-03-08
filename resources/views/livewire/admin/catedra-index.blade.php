<div>

    <div class="card">


            <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>

            @if ($catedra->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>UA</th>
                            <th>Carrera</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catedra as $cat)

                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->created_at}}</td>


                            <td>{{$cat->academic->name}}</td>
                            <td>{{$cat->carrera->name}}</td>
                            <td width="10px">
                                <button wire:click="download({{$cat->id}})" class="p-1 text-gray-400 rounded hover:text-blue-500 focus:text-blue-500 focus:ring-2 ring-blue-300 focus:outline-none">

                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



                <div class="card-footer">

                </div>
            @else


                <div class="card-body">
                   <strong>No hay registros ....</strong>
                </div>

            @endif





    </div>
</div>
