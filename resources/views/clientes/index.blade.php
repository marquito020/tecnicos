@extends('inicio')

@section('content')

@if(Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h2>Clientes</h2>


<div class="row justify-content">
        <a href="{{url('empleado/create')}}" class="button">Registrar Cliente</a>
        <!-- <br /> -->
        <!-- Button Home -->
        <a href="{{url('/home')}}" class="button">Volver</a>
</div>
<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Sexo</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->persona->nombre}}</td>
            <td>{{$cliente->persona->apellido_paterno}}</td>
            <td>{{$cliente->persona->apellido_materno}}</td>
            <td>{{$cliente->persona->sexo}}</td>
            <td>{{$cliente->persona->email}}</td>
            <td>

                <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                |

                <form action="{{url('/clientes/'.$cliente->id)}}" class="d-inline" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
                |
                <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-primary">
                    Ver
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$clientes->links()}}
@endsection