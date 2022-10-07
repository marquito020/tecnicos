@extends('inicio')
@section('tecnico', 'is-active')
@section('content')


<form action="{{url('/tecnicos')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('tecnicos.form',['modo'=>'Crear'])
</form>

@endsection