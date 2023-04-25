<div>

    <div class="card">


            <div class="card-header">
               <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="escriba un nombre" type="text" name="">
            </div>

            @if ($carrera->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Fecha</th>
                            <th>Sede</th>
                            <th>Unidad Académica</th>
                            <th>Categoría</th>
                            <th>Información</th>
                            <th>Plan de Estudio</th>
                            <th>Resolución</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrera as $cat)

                        <tr>
                            <td>{{ \Carbon\Carbon::parse($cat->created_at)->format('d/m/Y')}}</td>


                            <td>{{$cat->sede->name}}</td>
                            <td>{{$cat->academic->name}}</td>
                            <td>{{$cat->subcategory->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.carrera.show',$cat)}}" class="btn btn-success"><i class="fas fa-info"></i></a>

                            </td>
                            <td width="10px">
                                <button wire:click="download({{$cat->id}})" class="btn btn-outline-primary">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                            <td width="10px">
                                <button wire:click="descarga({{$cat->id}})" class="btn btn-outline-danger">
                                    <i class="fas fa-download"></i>
                                </button>
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
