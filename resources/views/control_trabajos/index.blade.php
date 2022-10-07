@extends('inicio')
@section('control_trabajos', 'is-active')
@section('content')

<!-- create index control trabajo -->
@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

<h3>{{ __('Control Trabajo') }}</h3>

<!-- button volver -->
<a href="{{ url('home') }}" class="button">Volver</a>

<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>Tecnico</th>
            <th>Fecha</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($control_trabajos as $control_trabajo)
        <tr>
            <td>{{$control_trabajo->trabajoAsignado->tecnico->persona->nombre}}</td>
            <td>{{$control_trabajo->fecha}}</td>
            <td>{{$control_trabajo->hora_inicio}}</td>
            <td>{{$control_trabajo->hora_fin}}</td>
            <td>
                <form action="{{url('control_trabajos/'.$control_trabajo->id)}}" method="post" style="display:inline">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection