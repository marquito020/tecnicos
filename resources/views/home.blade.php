@extends('inicio')

@section('content')

<br>
@can('tecnico.users.index')
<!-- Button tecnico -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('tecnicos')}}" class="btn btn-success">Tecnicos</a>
</div>
<br />
@endcan
@can('cliente.users.index')
<!-- Button cliente -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('clientes')}}" class="btn btn-success">Clientes</a>
</div>
<br />
@endcan
@can('cliente.formulario.index')
<!-- Button formulario -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('formularioClientes')}}" class="btn btn-success">Formulario</a>
</div>
<br />
@endcan
@can('asistencia.index')
<!-- Button turno -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('asistencias')}}" class="btn btn-success">Asistencias</a>
</div>
<br />
@endcan
@can('marcado.index')
<!-- Button marcado -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('marcado')}}" class="btn btn-success">Marcado</a>
</div>
<br />
@endcan
@can('servicio.index')
<!-- Button servicio -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('servicios')}}" class="btn btn-success">Servicios</a>
</div>
<br />
@endcan
@can('admin.users.index')
<!-- Button Administativos -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('administrativos')}}" class="btn btn-success">Administativos</a>
</div>
<br />
@endcan
@can('informe.create')
<!-- Button Trabajos Asignados -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('trabajo_asignados')}}" class="btn btn-success">Trabajos Asignados</a>
</div>
<br />
@endcan
@can('trabajo.create')
<!-- Button Asignar Trabajo -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('asignar_trabajos')}}" class="btn btn-success">Asignar Trabajo</a>
</div>
<br />
@endcan
@can('control.index')
<!-- Button Control Trabajo -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('control_trabajos')}}" class="btn btn-success">Control Trabajo</a>
</div>
<br />
@endcan
@can('control.create')
<!-- Marcar Control Trabajo -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('marcar_control_trabajos')}}" class="btn btn-success">Marcar Control Trabajo</a>
</div>
<br />
@endcan
@can('cliente.formulario.create')
<!-- Button Formulario -->
<div class="d-grid gap-2 col-5 mx-auto">
    <a href="{{url('formulario')}}" class="btn btn-success">Formulario</a>
</div>
<br />
@endcan
@endsection