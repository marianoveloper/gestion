@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a class="float-right btn btn-secondary btn-sm" href="{{route('admin.types.create')}}">Nueva Subcategoría</a>
    <h1>Lista de Subcategorias</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
{{session('info')}}

</div>
@endif
   <div class="card">
       <div class="card-body">
           <table class="table table-striped">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Nombre</th>
                       <th colspan="2"></th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($types as $type)
                   <tr>
                    <td>
                        {{$type->id}}
                    </td>
                    <td>
                        {{$type->name}}
                    </td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.types.edit', $type)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form method="POST" action="{{route('admin.types.destroy', $type)}}">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>

                        </>
                    </td>
                </tr>
                   @endforeach

               </tbody>
           </table>
       </div>
   </div>
@stop


