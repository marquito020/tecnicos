<!-- form administrativos -->
<div class="form-group">
    <!-- Nombre -->
    <label for="Nombre" class="control-label">{{'Nombre'}}</label>
    <input class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror" id="nombre" type="text" name="nombre" placeholder="Nombre del administrativo" value="{{ isset($administrativo->Nombre)?$administrativo->Nombre:old('Nombre') }}">
    <br />
    @error('Nombre')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- Apellido -->
    <label for="Apellido" class="control-label">{{'Apellido Paterno'}}</label>
    <input class="form-control bg-light shadow-sm @error('apellido_paterno') is-invalid @else border-0 @enderror" id="apellido_paterno" type="text" name="apellido_paterno" placeholder="Apellido del administrativo" value="{{ isset($administrativo->persona->apellido_paterno)?$administrativo->persona->apellido_paterno:old('apellido_paterno') }}">
    <br />
    @error('apellido_paterno')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- input apellido materno -->
    <label for="Apellido" class="control-label">{{'Apellido Materno'}}</label>
    <input class="form-control bg-light shadow-sm @error('apellido_materno') is-invalid @else border-0 @enderror" id="apellido_materno" type="text" name="apellido_materno" placeholder="Apellido del administrativo" value="{{ isset($administrativo->persona->apellido_materno)?$administrativo->persona->apellido_materno:old('apellido_materno') }}">
    <br />
    @error('apellido_materno')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- CI -->
    <label for="CI" class="control-label">{{'CI'}}</label>
    <input class="form-control bg-light shadow-sm @error('ci') is-invalid @else border-0 @enderror" id="ci" type="text" name="ci" placeholder="CI del administrativo" value="{{ isset($administrativo->persona->ci)?$administrativo->persona->ci:old('ci') }}">
    <br />
    @error('ci')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- Celular -->
    <label for="Celular" class="control-label">{{'Celular'}}</label>
    <input class="form-control bg-light shadow-sm @error('celular') is-invalid @else border-0 @enderror" id="celular" type="text" name="celular" placeholder="Celular del administrativo" value="{{ isset($administrativo->persona->celular)?$administrativo->persona->celular:old('celular') }}">
    <br />
    @error('celular')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- Email -->
    <label for="Email" class="control-label">{{'Email'}}</label>
    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" type="text" name="email" placeholder="Email del administrativo" value="{{ isset($administrativo->persona->email)?$administrativo->persona->email:old('email') }}">
    <br />
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- Direccion -->
    <label for="Direccion" class="control-label">{{'Direccion'}}</label>
    <input class="form-control bg-light shadow-sm @error('direccion') is-invalid @else border-0 @enderror" id="direccion" type="text" name="direccion" placeholder="Direccion del administrativo" value="{{ isset($administrativo->persona->direccion)?$administrativo->persona->direccion:old('direccion') }}">
    <br />
    @error('Direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- Fecha de nacimiento -->
    <label for="FechaNacimiento" class="control-label">{{'Fecha de nacimiento'}}</label>
    <input class="form-control bg-light shadow-sm @error('fecha_de_nacimiento') is-invalid @else border-0 @enderror" id="fecha_de_nacimiento" type="date" name="fecha_de_nacimiento" placeholder="Fecha de nacimiento del administrativo" value="{{ isset($administrativo->persona->fecha_de_nacimiento)?$administrativo->persona->fecha_de_nacimiento:old('fecha_de_nacimiento') }}">
    <br />
    @error('fecha_de_nacimiento')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- Sexo   -->
    <label for="sexo" class="control-label">{{'Sexo'}}</label>
    <select class="form-control bg-light
    shadow-sm @error('sexo') is-invalid @else border-0 @enderror
    " id="sexo" name="sexo" value="{{ isset($administrativo->persona->sexo)?$administrativo->persona->sexo:old('sexo') }}">
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
    </select>
    <br />
    @error('sexo')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- crear input Profesion -->
    <label for="sexo" class="control-label">{{'Profesion'}}</label>
    <input class="form-control bg-light shadow-sm @error('profesion') is-invalid @else border-0 @enderror" id="profesion" type="text" name="profesion" placeholder="Profesion" value="{{ isset($administrativo->profesion)?$administrativo->profesion:old('profesion') }}">
    @error('profesion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror

    <div class="row justify-content">
        <!-- Submit -->
        <input class="button" type="submit" value="{{ $modo=='Crear' ? 'Agregar':'Modificar' }}">
        <a class="button" href="{{ url('administrativos') }}">Cancelar</a>
    </div>
</div>