<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')
<!-- crear formulario cliente -->

    <h2>Crear formulario</h2>
    <form action="{{ url('cliente_crea_formularios') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('cliente_crea_formularios.form', ['modo'=>'Crear'])
    </form>

@endsection