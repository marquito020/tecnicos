@extends('inicio')
@section('control_trabajos', 'is-active')
@section('content')

<!-- create index control trabajo -->
@if (session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

<h2>{{ __('Control Trabajo') }}</h2>
<div class="card-body">
    <br />
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
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
                        <td>{{$control_trabajo->trabajoAsignado->tecnico->nombre}}</td>
                        <td>{{$control_trabajo->fecha}}</td>
                        <td>{{$control_trabajo->hora_inicio}}</td>
                        <td>{{$control_trabajo->hora_fin}}</td>
                        <td>
                            <a href="{{url('control_trabajos/'.$control_trabajo->id.'/edit')}}" class="btn btn-warning">Editar</a>
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
    </div>
</div>

</div>

@endsection