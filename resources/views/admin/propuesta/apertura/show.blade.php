@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Apertura de Propuesta</h1>
@stop

@section('content')

<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingTen">
          <h5 class="mb-0">
            <button class=" btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
              Título de la Propuesta
            </button>
          </h5>
        </div>

        <div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-parent="#accordion">
          <div class="card-body">
          {{$propuesta->title}}
          </div>
        </div>
      </div>



    </div>

    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Duración y Horas Acreditadas
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          {{$propuesta->duracion}}
        </div>
      </div>
    </div>



      <div class="card">
        <div class="card-header" id="headingSix">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Fecha de Inicio de Cursado
            </button>
          </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
          <div class="card-body">
            {{$propuesta->date_start}}
          </div>
        </div>
      </div>

      </div>
      <div class="card">
        <div class="card-header" id="headingEight">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                Link de Google Drive de las Firmas de Certificados
            </button>
          </h5>
        </div>
        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
          <div class="card-body">
            @if(@isset($propuesta->certificado))

                    <a href="{{$propuesta->certificado}}" target="_blank">{{$propuesta->certificado}}</a>
            @else
                <span class="badge badge-danger">No hay link de las firmas de certificado</span>
            @endif
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingNine">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                Link de Google Drive para los logos del Flyer
            </button>
          </h5>
        </div>
        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
          <div class="card-body">
            @if(@isset($propuesta->flyer))
                    {{$propuesta->flyer}}
            @else
                <span class="badge badge-danger">No hay link de Flyer</span>
            @endif
          </div>
        </div>
      </div>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
