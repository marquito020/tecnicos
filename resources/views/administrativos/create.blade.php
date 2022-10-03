<!-- create administrativos -->
<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')


<!-- form create servicio -->
<form action="{{url('/administrativos')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('administrativos.form',['modo'=>'Crear'])
</form>


@endsection