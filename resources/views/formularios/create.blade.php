<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')
<!-- crear formulario cliente -->

    <h3>Crear formulario</h3>
    <form action="{{ url('formularioClientes') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('formularios.form', ['modo'=>'Crear'])
    </form>

@endsection