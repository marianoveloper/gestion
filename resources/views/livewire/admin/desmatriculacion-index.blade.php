<div>
    <div class="card">


        <div class="card-header">
           <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
        </div>

        @if ($desmatriculacion->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Email</th>
                        <th>Unidad Académica</th>
                        <th>Carrera</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($desmatriculacion as $desmat)

                    <tr>

                        <td>{{ \Carbon\Carbon::parse($desmat->created_at)->format('d/m/Y')}}</td>

                        <td>{{$desmat->name}}</td>
                        <td>{{$desmat->dni}}</td>
                        <td>{{$desmat->email}}</td>

                        <td>{{$desmat->academic->name}}</td>
                        <td>{{$desmat->carrera->name}}</td>



                        <td width="10px">

                                @switch($desmat->status)

                                @case(1)
                                <button wire:click="status({{$desmat}})" class="btn btn-warning">
                                    <i class="fas fa-exclamation-triangle"></i></button>
                                @break
                                @case(2)

                                <button wire:click="status({{$desmat}})" class="btn btn-primary">
                                    <i class="fas fa-spinner"></i></button>
                                @break
                                @case(3)

                                <button wire:click="status({{$desmat}})" class="btn btn-success">
                                    <i class="fas fa-clipboard-check"></i></button>
                                @break
                                @default

                                @endswitch

                        </td>
                        <td>
                            <span
                            class="badge badge-success">
                           {{$desmat->status_name}}
                        </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



            <div class="card-footer">
                {{$desmatriculacion->links()}}
            </div>
        @else


            <div class="card-body">
               <strong>No hay registros ....</strong>
            </div>

        @endif
</div>

</div>
