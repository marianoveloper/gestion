@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Solicitudes de Matriculación</h1>
@stop

@section('content')
   @livewire('admin.matriculacion-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
