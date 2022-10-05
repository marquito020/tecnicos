<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')
<!-- crear formulario cliente -->

    <h3>Crear formulario</h3>
    <form action="{{ url('cliente_crea_formularios') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('cliente_crea_formularios.form', ['modo'=>'Crear'])
    </form>

@endsection