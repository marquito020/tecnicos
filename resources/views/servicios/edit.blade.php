<!-- extends layouts -->
@extends('layouts.app')
<!-- section -->
@section('content')

<!-- Editar -->
<div class="container">
    <form action="{{url('/servicios/'.$servicio->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('servicios.form',['modo'=>'Editar'])
    </form>
</div>

@endsection