@extends('inicio')
@section('trabajo_asignados', 'is-active')
@section('content')

<!-- index trabajo asignados -->
<h3>Trabajos Asignados</h3>
<!-- Button volver -->
<!-- button home -->

<a href="{{ route('home') }}" class="button">Volver</a>

<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>#</th>
            <th>Estado</th>
            <th>Formulario Cliente</th>
            <th>Tecnico</th>
            <th>Administrativo</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trabajo_asignados as $trabajo_asignado)
        <tr>
            <td>{{ $trabajo_asignado->id }}</td>
            <td>{{ $trabajo_asignado->estado }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->descripcion }}</td>
            <td>{{ $trabajo_asignado->tecnico->persona->nombre }}</td>
            <td>{{ $trabajo_asignado->administrativo->persona->nombre}}</td>
            <td>{{$trabajo_asignado->formularioCliente->cliente->persona->nombre}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $trabajo_asignados->links() }}
@endsection