@extends('inicio')
@section('asignar_trabajos', 'is-active')
@section('content')

<!-- index formulario -->
<h3>Agregar Trabajo</h3>
<div class="row justify-content">
    <!-- button volver -->
    <a href="{{ url('home') }}" class="button">Volver</a>
</div>
<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Servicio</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($formularios as $formulario)
        <tr>
            <td>{{ $formulario->descripcion }}</td>
            <td>{{ $formulario->fecha }}</td>
            <td>{{ $formulario->hora }}</td>
            <td>{{ $formulario->estado }}</td>
            <td>{{ $formulario->servicio->nombre }}</td>
            <td>{{ $formulario->cliente->persona->nombre }}</td>
            <td>
                <!-- button show -->
                <a href="{{ route('asignar_trabajos.show',$formulario) }}" class="btn btn-success">Asignar Tecnico</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection