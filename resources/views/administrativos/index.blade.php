<!-- Index Administrativos -->
@extends('inicio')
@section('administativo', 'is-active')
@section('content')

<h3 class="card-header">{{ __('Administrativos') }}</h3>

<a class="button" href="{{url('administrativos/create')}}">Crear Adminin</a>

<table class="table table-night table-hover">
    <thead class="thead-night">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($administrativos as $administrativo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$administrativo->persona->nombre}}</td>
            <td>{{$administrativo->persona->apellido_paterno}}</td>
            <td>{{$administrativo->persona->celular}}</td>
            <td>
                <a class="btn btn-warning" href="{{url('/administativos/'.$administrativo->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/administativos/'.$administrativo->id)}}" style="display:inline">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $administrativos->links() }}
@endsection