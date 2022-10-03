@extends('inicio')

@section('content')
<!-- index formulario -->
<h2>Formularios</h2>
<!-- crear formuario -->
<a href="{{ url('formularioClientes/create') }}" class="btn btn-success">Crear Formulario</a>
<!-- button volver -->
<a href="{{ url('home') }}" class="button">Volver</a>

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
                <a href="{{ route('formularioClientes.show',$formulario) }}" class="button">Ver</a>
                |
                <form action="{{ url('/formularioClientes/'.$formulario->id) }}" method="post" style="display:inline">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="button" onclick="return confirm('¿Borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $formularios->links() }}
@endsection