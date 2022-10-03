<h2>{{$Modo}} tecnico</h2>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($tecnico->persona->nombre)?$tecnico->persona->nombre:old('nombre')}}" id="nombre">
</div>
<div class="form-group">
    <label for="apellido_paterno">Apellido Paterno</label>
    <input type="text" class="form-control" name="apellido_paterno" value="{{isset($tecnico->persona->apellido_paterno)?$tecnico->persona->apellido_paterno:old('apellido_paterno')}}" id="apellido_paterno">
</div>
<div class="form-group">
    <label for="apellido_materno">Apellido Materno</label>
    <input type="text" class="form-control" name="apellido_materno" value="{{isset($tecnico->persona->apellido_paterno)?$tecnico->persona->apellido_materno:old('apellido_materno')}}" id="apellido_materno">
</div>
<div class="form-group">
    <label for="ci">CI</label>
    <input type="text" class="form-control" name="ci" value="{{isset($tecnico->persona->ci)?$tecnico->persona->ci:old('ci')}}" id="ci">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" value="{{isset($tecnico->persona->email)?$tecnico->persona->email:old('email')}}" id="email">
</div>
<div class="form-group">
    <label for="profesion">Profesion</label>
    <input type="text" class="form-control" name="profesion" value="{{isset($tecnico->profesion)?$tecnico->profesion:old('profesion')}}" id="profesion">
</div>
<div class="form-group">
    <label for="sexo">Sexo</label>
    <input type="text" class="form-control" name="sexo" value="{{isset($tecnico->persona->sexo)?$tecnico->persona->sexo:old('sexo')}}" id="sexo">
</div>
<div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" class="form-control" name="celular" value="{{isset($tecnico->persona->celular)?$tecnico->persona->celular:old('celular')}}" id="celular">
</div>
<div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="{{isset($tecnico->persona->direccion)?$tecnico->persona->direccion:old('direccion')}}" id="direccion">
</div>
<div class="form-group">
    <label for="fecha_de_nacimiento">Fecha de Nacimiento</label>
    <input type="date" class="form-control" name="fecha_de_nacimiento" value="{{isset($tecnico->persona->fecha_de_nacimiento)?$tecnico->persona->fecha_de_nacimiento:old('fecha_de_nacimiento')}}" id="fecha_de_nacimiento">
</div>

<br />
<div class="row justify-content">
    <input class="button" type="submit" value="{{$Modo}} Datos">
    <a class="button" href="{{url('tecnicos/')}}">Regresar</a>
</div>
<br />