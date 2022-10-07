@section('cliente_crea_formularios', 'is-active')
<style>
    .text-center {
        text-align: center;
    }

    #map {
        width: "100%";
        height: 400px;
    }
</style>

<!-- Mensaje -->
@if(Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- crear form de FormularioCliente -->
<div class="form-group">
    <label for="descripcion">Descripción</label>
    <input class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror" id="descripcion" type="text" name="descripcion" placeholder="Descripción del formulario" value="{{ isset($formularioCliente->descripcion)?$formularioCliente->descripcion:old('descripcion') }}">
    <!--     <br /> -->
    @error('descripcion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <!-- servicio -->
    <label for="id_servicio">Servicio</label>
    <select class="form-control bg-light shadow-sm @error('id_servicio') is-invalid @else border-0 @enderror" id="id_servicio" name="id_servicio">
        <option value="">Seleccione un servicio</option>
        @foreach($servicios as $servicio)
        <option value="{{ $servicio->id }}" {{ isset($formularioCliente->id_servicio) && $formularioCliente->id_servicio == $servicio->id ? 'selected' : '' }}>{{ $servicio->nombre }}</option>
        @endforeach
    </select>
    @error('id_servicio')
    <span class="invalid-feedback" role="alert">
        <strong>El servicio es requerido</strong>
    </span>
    @enderror
    <br />
    <!-- fecha -->
    <label for="fecha">Fecha</label>
    <input class="form-control bg-light shadow-sm @error('fecha') is-invalid @else border-0 @enderror" id="fecha" type="date" name="fecha" placeholder="Fecha del formulario" value="{{ isset($formularioCliente->fecha)?$formularioCliente->fecha:old('fecha') }}">

    @error('fecha')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <!--   <br> -->
    @enderror
    <br />
    <!-- hora -->
    <label for="hora">Hora</label>
    <input class="form-control bg-light shadow-sm @error('hora') is-invalid @else border-0 @enderror" id="hora" type="time" name="hora" placeholder="Hora del formulario" value="{{ isset($formularioCliente->hora)?$formularioCliente->hora:old('hora') }}">

    @error('hora')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    <!-- <br> -->
    @enderror
    <br />
    <!-- input cliente -->
    <label for="id_cliente">Cliente</label>
    <!-- option cliente -->
    <select class="form-control bg-light shadow-sm @error('id_cliente') is-invalid @else border-0 @enderror" id="id_cliente" name="id_cliente">
        <option value="">Seleccione un cliente</option>
        @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" style="color: black;" {{ isset($formularioCliente->id_cliente) && $formularioCliente->id_cliente == $cliente->id ? 'selected' : '' }}>{{ $cliente->persona->nombre }}</option>
        @endforeach
    </select>
    @error('id_cliente')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <!-- input estado -->
    <input class="form-control bg-light shadow-sm @error('estado') is-invalid @else border-0 @enderror" id="estado" type="hidden" name="estado" placeholder="Estado" value="{{ isset($formularioCliente->estado)?$formularioCliente->estado:old('estado') }} Pendiente">

    <p>Marque ubicacion en el mapa u obtenga su ubicacion con geolocalizacion</p>
    @error('lat')
    <span class="invalid-feedback" role="alert">
        <strong>Las coordenadas son requeridas</strong>
    </span>
    @enderror
    <div class="row">
        <!-- Button geolocation -->
        <button type="button" class="button col-5" onclick="getLocation()">GPS</button>
        <!-- button cancelar -->
        <a class="button" href="{{ route('cliente_crea_formularios.index') }}">
            Voler
        </a>
    </div>
    <!--     <br /> -->
    <!-- button crear -->
    <button class="btn btn-primary btn-lg btn-block">Registrar</button>
    <!-- Mapa -->
    <div class="mapform">
        <br>
        <div class="row" hidden>
            <div class="col-5">
                <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
            </div>
            <div class="col-5">
                <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
            </div>
        </div>

        <!--         <br> -->

        <div id="map"></div>

        <script>
            let map, marker = [];

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: -17.78629,
                        lng: -63.18117,
                    },
                    zoom: 15,
                    scrollwheel: true,
                });

                const uluru = {
                    lat: null,
                    lng: null,
                };
                marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: true,
                });

                google.maps.event.addListener(map, 'click',
                    function(event) {
                        pos = event.latLng
                        marker.setPosition(pos);
                        document.getElementById('lat').value = marker.getPosition().lat();
                        document.getElementById('lng').value = marker.getPosition().lng();
                        /* infoWindows */
                        const infoWindow = new google.maps.InfoWindow({
                            content: '<h6>Marcado</h6>',
                        });
                        infoWindow.open(map, marker);
                    })

                /* add listener */
                google.maps.event.addListener(marker, 'dragend', function() {
                    document.getElementById('lat').value = marker.getPosition().lat();
                    document.getElementById('lng').value = marker.getPosition().lng();
                });
            }

            function getLocation() {
                /* geo location */
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(position => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(pos);
                        console.log(pos);
                        document.getElementById('lat').value = pos.lat;
                        document.getElementById('lng').value = pos.lng;
                        let marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            icon: {
                                url: "{{ asset('images/google-maps.png') }}",
                                scaledSize: new google.maps.Size(50, 50)
                            },
                        });
                        /* infoWindows */
                        const infoWindow = new google.maps.InfoWindow({
                            content: '<h6>Estas aquí</h6>',
                        });
                        infoWindow.open(map, marker);
                    }, () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtBE9UAI6NcVr_uKbS8GytFUhhi65CiM&callback=initMap" type="text/javascript"></script>
    </div>

    <!-- <br> -->

</div>