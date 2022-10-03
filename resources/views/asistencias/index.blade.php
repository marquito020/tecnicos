@extends('inicio')
@section('asistencia', 'is-active')
@section('content')

<!-- Create index asistencia -->
<!-- Message -->
@if(Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<h2>{{ __('Asistencias') }}</h2>
<!-- button home -->
<a href="{{url('/home')}}" class="button">Volver</a>

<table class="table table-night table-hover">
    <thead class="thead-night">
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Tecnico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asistencias as $asistencia)
        <tr>
            <td>{{$asistencia->id}}</td>
            <td>{{$asistencia->fecha}}</td>
            <td>{{$asistencia->hora_inicio}}</td>
            <td>{{$asistencia->hora_fin}}</td>
            <td>{{$asistencia->tecnico->persona->nombre}}</td>
            <td>
                <a style="background-color: orange; color: white;" href="{{ route('asistencia.show',$asistencia) }}" class="btn btn-">
                    Ubicacion
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$asistencias->links()}}


@endsection