<!-- create administrativos -->
<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')

<h3>Crear Administrativo</h3>
<!-- form create servicio -->
<form action="{{url('/administrativos')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('administrativos.form',['modo'=>'Crear'])
</form>


@endsection