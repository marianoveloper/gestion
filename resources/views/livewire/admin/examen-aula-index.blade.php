<div>

    <div class="card">


            <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>

            @if ($matriculacion->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Fecha Envio</th>
                            <th>Unidad Académica</th>
                            <th>Carrera</th>

                            <th span=2>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)

                        <tr>

                            <td>{{ \Carbon\Carbon::parse($mat->created_at)->format('d/m/Y')}}</td>



                            <td>{{$mat->academic->name}}</td>
                            <td>{{$mat->carrera->name}}</td>



                            <td width="10px">
                                <button wire:click="download({{$mat->id}})" class="btn btn-info">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">

                                    @switch($mat->status)
                                    @case(1)
                                    <button wire:click="status({{$mat}})" class="btn btn-warning">
                                        <i class="fas fa-exclamation-triangle"></i></button>
                                    @break
                                    @case(2)

                                    <button wire:click="status({{$mat}})" class="btn btn-primary">
                                        <i class="fas fa-spinner"></i></button>
                                    @break
                                    @case(3)

                                    <button wire:click="status({{$mat}})" class="btn btn-success">
                                        <i class="fas fa-clipboard-check"></i></button>
                                    @break
                                    @default

                                    @endswitch

                            </td>
                            <td>
                                <span
                                class="badge badge-success">
                               {{$mat->status_name}}
                            </span>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



                <div class="card-footer">
                    {{$matriculacion->links()}}
                </div>
            @else


                <div class="card-body">
                   <strong>No hay registros ....</strong>
                </div>

            @endif





    </div>
</div>
