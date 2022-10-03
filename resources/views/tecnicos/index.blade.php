@extends('inicio')
@section('tecnico', 'is-active')
@section('content')
@if(Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h2>Tecnicos</h2>

<!-- Button crear -->
<div class="row justify-content">
    <a href="{{url('tecnicos/create')}}" class="button">Registrar Tecnico</a>
    <!-- Botton home -->
    <a href="{{url('/home')}}" class="button">Volver</a>
</div>
<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tecnicos as $tecnico)
        <tr>
            <td>{{$tecnico->id}}</td>
            <td>{{$tecnico->persona->nombre}}</td>
            <td>{{$tecnico->persona->apellido_paterno}}</td>
            <td>{{$tecnico->persona->apellido_materno}}</td>
            <td>{{$tecnico->persona->email}}</td>
            <td>

                <a href="{{url('/tecnicos/'.$tecnico->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                |

                <form action="{{url('/tecnicos/'.$tecnico->id)}}" class="d-inline" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
                |
                <a href="{{url('/tecnicos/'.$tecnico->id.'/edit')}}" class="btn btn-primary">
                    Ver
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$tecnicos->links()}}
@endsection