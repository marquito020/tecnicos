@extends('inicio')
@section('marcar_control_trabajos', 'is-active')
@section('content')

<!-- index formulario -->
<h2>Control de trabajo</h2>

<!-- button volver -->
<a href="{{ url('home') }}" class="button">Volver</a>

<br>
<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>Tecnico</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Descripcion</th>
            <th>Servicio</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trabajo_asignados as $trabajo_asignado)
        <tr>
            <td>{{ $trabajo_asignado->tecnico->persona->nombre }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->estado }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->fecha }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->hora }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->descripcion }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->servicio->nombre }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->cliente->persona->nombre }}</td>
            <td>
                <!-- button show -->
                <a href="{{ route('marcar_control_trabajos.show',$trabajo_asignado->id) }}" class="button">
                    @if($trabajo_asignado->formularioCliente->estado == 'Pendiente')
                        Marcar como realizado
                    @else
                        Marcar como pendiente
                    @endif
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection