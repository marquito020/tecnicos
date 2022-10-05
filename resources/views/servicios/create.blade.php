<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')

<h3>Crear Servicio</h3>
<!-- form create servicio -->
<form action="{{url('/servicios')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('servicios.form',['modo'=>'Crear'])
</form>


@endsection