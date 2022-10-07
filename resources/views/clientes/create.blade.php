@extends('inicio')
@section('cliente', 'is-active')
@section('content')


<form action="{{url('/clientes')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('clientes.form',['modo'=>'Crear'])
</form>

@endsection