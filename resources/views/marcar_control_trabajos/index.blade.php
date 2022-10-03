@extends('inicio')
@section('marcar_control_trabajos', 'is-active')
@section('content')

<!-- index formulario -->
<h4>Control de trabajo</h4>

<!-- Mensaje -->
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- button volver -->
<a href="{{ url('home') }}" class="button">Volver</a>

<table class="table table-night">
    <thead class="thead-night">
        <tr>
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
            <td>{{ $trabajo_asignado->formularioCliente->estado }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->fecha }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->hora }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->descripcion }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->servicio->nombre }}</td>
            <td>{{ $trabajo_asignado->formularioCliente->cliente->persona->nombre }}</td>
            <td>
                @if($trabajo_asignado->formularioCliente->estado == 'Realizado')
                Realizado
                @else
                <!-- button show -->
                <a href="{{ route('marcar_control_trabajos.show',$trabajo_asignado->id) }}" class="button">
                    @if($trabajo_asignado->formularioCliente->estado == 'Pendiente')
                    Marcar Inicio
                    @elseif($trabajo_asignado->formularioCliente->estado == 'En proceso')
                    Marcar Fin
                    @endif
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection