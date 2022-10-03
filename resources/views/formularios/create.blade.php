<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')
<!-- crear formulario cliente -->

    <h1>Crear formulario</h1>
    <form action="{{ url('formularioClientes') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('formularios.form', ['modo'=>'Crear'])
    </form>

@endsection