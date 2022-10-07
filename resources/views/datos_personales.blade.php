@extends('inicio')

@section('datos_personales', 'is-active')

@section('content')


<h2>Datos Personales</h2>

<br>
<h5>Nombre: {{$user->persona->nombre}}</h5>
<h5>Apellido Paterno: {{$user->persona->apellido_paterno}}</h5>
<h5>Apellido Materno: {{$user->persona->apellido_materno}}</h5>
<h5>CI: {{$user->persona->ci}}</h5>
<h5>Direccion: {{$user->persona->direccion}}</h5>
<h5>Celular: {{$user->persona->celular}}</h5>
<h5>Fecha de Nacimiento: {{$user->persona->fecha_de_nacimiento}}</h5>
<h5>Sexo: {{$user->persona->sexo}}</h5>



@endsection