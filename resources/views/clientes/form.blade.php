<div class="form-group">
    <!-- Nombre -->
    <label for="Nombre" class="control-label">{{'Nombre'}}</label>
    <input class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror" id="nombre" type="text" name="nombre" placeholder="Nombre del cliente" value="{{ isset($cliente->Nombre)?$cliente->Nombre:old('Nombre') }}">
    @error('nombre')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br />
    <!-- Apellido -->
    <label for="Apellido" class="control-label">{{'Apellido Paterno'}}</label>
    <input class="form-control bg-light shadow-sm @error('apellido_paterno') is-invalid @else border-0 @enderror" id="apellido_paterno" type="text" name="apellido_paterno" placeholder="Apellido del cliente" value="{{ isset($cliente->persona->apellido_paterno)?$cliente->persona->apellido_paterno:old('apellido_paterno') }}">

    @error('apellido_paterno')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>

    @enderror
    <br />
    <!-- input apellido materno -->
    <label for="Apellido" class="control-label">{{'Apellido Materno'}}</label>
    <input class="form-control bg-light shadow-sm @error('apellido_materno') is-invalid @else border-0 @enderror" id="apellido_materno" type="text" name="apellido_materno" placeholder="Apellido del cliente" value="{{ isset($cliente->persona->apellido_materno)?$cliente->persona->apellido_materno:old('apellido_materno') }}">

    @error('apellido_materno')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>

    @enderror
    <br>
    <!-- CI -->
    <label for="CI" class="control-label">{{'CI'}}</label>
    <input class="form-control bg-light shadow-sm @error('ci') is-invalid @else border-0 @enderror" id="ci" type="text" name="ci" placeholder="CI del cliente" value="{{ isset($cliente->persona->ci)?$cliente->persona->ci:old('ci') }}">

    @error('ci')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br />
    <!-- Celular -->
    <label for="Celular" class="control-label">{{'Celular'}}</label>
    <input class="form-control bg-light shadow-sm @error('celular') is-invalid @else border-0 @enderror" id="celular" type="text" name="celular" placeholder="Celular del cliente" value="{{ isset($cliente->persona->celular)?$cliente->persona->celular:old('celular') }}">
    @error('celular')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <!-- Email -->
    <label for="Email" class="control-label">{{'Email'}}</label>
    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" type="text" name="email" placeholder="Email del cliente" value="{{ isset($cliente->persona->email)?$cliente->persona->email:old('email') }}">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <!-- Direccion -->
    <label for="Direccion" class="control-label">{{'Direccion'}}</label>
    <input class="form-control bg-light shadow-sm @error('direccion') is-invalid @else border-0 @enderror" id="direccion" type="text" name="direccion" placeholder="Direccion del cliente" value="{{ isset($cliente->persona->direccion)?$cliente->persona->direccion:old('direccion') }}">
    @error('direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <!-- Fecha de nacimiento -->
    <label for="FechaNacimiento" class="control-label">{{'Fecha de nacimiento'}}</label>
    <input class="form-control bg-light shadow-sm @error('fecha_de_nacimiento') is-invalid @else border-0 @enderror" id="fecha_de_nacimiento" type="date" name="fecha_de_nacimiento" placeholder="Fecha de nacimiento del cliente" value="{{ isset($cliente->persona->fecha_de_nacimiento)?$cliente->persona->fecha_de_nacimiento:old('fecha_de_nacimiento') }}">
    @error('fecha_de_nacimiento')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <!-- Sexo   -->
    <label for="sexo" class="control-label">{{'Sexo'}}</label>
    <select class="form-control bg-light
    shadow-sm @error('sexo') is-invalid @else border-0 @enderror
    " id="sexo" name="sexo" value="{{ isset($cliente->persona->sexo)?$cliente->persona->sexo:old('sexo') }}">
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
    </select>
    @error('sexo')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br />

    <div class="row justify-content">
        <!-- Submit -->
        <input class="button" type="submit" value="{{ $modo=='Crear' ? 'Agregar':'Modificar' }}">
        <a class="button" href="{{ url('clientes') }}">Cancelar</a>
    </div>
</div>