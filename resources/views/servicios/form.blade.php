@section('servicio', 'is-active')
<!-- message -->
<!-- @if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif -->

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border-0 @enderror" id="nombre" type="text" name="nombre" placeholder="Nombre del servicio" value="{{ isset($servicio->nombre)?$servicio->nombre:old('nombre') }}">
    <br />
    @error('nombre')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- descripcion -->
    <label for="descripcion">Descripcion</label>
    <input class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror" id="descripcion" type="text" name="descripcion" placeholder="Descripcion del servicio" value="{{ isset($servicio->descripcion)?$servicio->descripcion:old('descripcion') }}">
    <br />
    @error('descripcion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
    <!-- precio -->
    <label for="precio">Precio</label>
    <input class="form-control bg-light shadow-sm @error('precio') is-invalid @else border-0 @enderror" id="precio" type="text" name="precio" placeholder="Precio del servicio" value="{{ isset($servicio->precio)?$servicio->precio:old('precio') }}">
    <br />
    @error('precio')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <br>
    @enderror
</div>
<div class="row justify-content">
    <input class="button" type="submit" value="{{ $modo }} datos">
    <a class="button" href="{{ route('servicios.index') }}">
        Cancelar
    </a>
</div>