<!-- extends layouts -->
@extends('inicio')
<!-- section -->
@section('content')


    <!-- form create servicio -->
    <form action="{{url('/servicios')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('servicios.form',['modo'=>'Crear'])
    </form>


@endsection