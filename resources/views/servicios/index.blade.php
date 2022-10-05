<!-- layout -->
@extends('inicio')
@section('servicio', 'is-active')
<!-- seccion -->
@section('content')
<h3 class="card-header">{{ __('Servicios') }}</h3>
<!-- Create index servicios -->
<div class="row justify-content">
    <a class="button" href="{{url('servicios/create')}}">Agregar Servicio</a>
    <!-- button home -->
    <a href="{{url('/')}}" class="button">Volver</a>
</div>

<!-- Message -->
@if(Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card-body">
    <table class="table table-night table-hover">
        <thead class="thead-night">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$servicio->nombre}}</td>
                <td>{{$servicio->descripcion}}</td>
                <td>{{$servicio->precio}}</td>
                <td>
                    <a class="btn btn-warning" href="{{url('/servicios/'.$servicio->id.'/edit')}}">
                        Editar
                    </a>
                    <form method="post" action="{{url('/servicios/'.$servicio->id)}}" style="display:inline">
                        {{csrf_field()}}
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