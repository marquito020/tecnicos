<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')

<!-- Editar -->
<h3>Editar Servicio</h3>
    <form action="{{url('/servicios/'.$servicio->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('servicios.form',['modo'=>'Editar'])
    </form>


@endsection