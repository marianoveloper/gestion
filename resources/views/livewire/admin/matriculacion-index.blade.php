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
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>UA</th>
                            <th>Carrera</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matriculacion as $mat)
                        <tr>
                            <td>{{$mat->id}}</td>
                            <td>{{$mat->created_at}}</td>
                            <td>{{$mat->tipo}}</td>
                            <td>{{$mat->academic->name}}</td>
                            <td>{{$mat->carrera->name}}</td>
                            <td width="10px">
                                <a class="btn btn-success"  href="#">Descargar</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



                <div class="card-footer">
                    {{$users->links()}}
                </div>
            @else


                <div class="card-body">
                   <strong>No hay registros ....</strong>
                </div>

            @endif





    </div>
</div>
