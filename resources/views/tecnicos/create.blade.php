@extends('inicio')

@section('content')


<form action="{{url('/tecnicos')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('tecnicos.form',['Modo'=>'Crear'])
</form>

@endsection