<div>

    <div class="card">


            <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>

            @if ($propuesta->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Fecha</th>
                            <th>Sede</th>
                            <th>Unidad Académica</th>
                           <!-- <th>Categoría</th>-->
                            <th>Información</th>
                            <th>Descripción</th>
                            <th>Programa</th>
                            <th>Resolución</th>
                            <th>Cv</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($propuesta as $cat)

                        <tr>
                            <td>{{ \Carbon\Carbon::parse($cat->created_at)->format('d/m/Y')}}</td>


                            <td>{{$cat->sede->name}}</td>
                            <td>{{$cat->academic->name}}</td>

                            <td width="10px">
                                <a href="{{route('admin.propuesta.apertura.show',$cat)}}" class="btn btn-success"><i class="fas fa-info"></i></a>

                            </td>
                            <td width="10px">
                                <button wire:click="descarga({{$cat->id}})" class="btn btn-outline-primary">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">
                                <button wire:click="descarga({{$cat->id}})" class="btn btn-outline-danger">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">
                                <button wire:click="descarga({{$cat->id}})" class="btn btn-outline-danger">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">
                                <button wire:click="descarga({{$cat->id}})" class="btn btn-outline-danger">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">

                                @switch($cat->status)
                                @case(1)
                                <button wire:click="status({{$cat}})" class="btn btn-warning">
                                    <i class="fas fa-exclamation-triangle"></i></button>
                                @break
                                @case(2)

                                <button wire:click="status({{$cat}})" class="btn btn-primary">
                                    <i class="fas fa-spinner"></i></button>
                                @break
                                @case(3)

                                <button wire:click="status({{$cat}})" class="btn btn-success">
                                    <i class="fas fa-clipboard-check"></i></button>
                                @break
                                @case(4)

                                <button wire:click="status({{$cat}})" class="btn btn-danger">
                                    <i class="fas fa-times"></i></button>
                                @break
                                @default

                                @endswitch

                        </td>
                            <td>
                                <span
                                class="badge badge-success">
                               {{$cat->status_name}}
                            </span>
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
