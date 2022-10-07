@extends('inicio')

@section('content')

<style>
    .text-center {
        text-align: center;
    }

    #map {
        width: "100%";
        height: 400px;
    }
</style>
<!-- marcado -->

<div class="card-header">Marcado</div>
<div class="card-body">
    <!-- Mensaje Error -->
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Mensaje confirmacion -->
    @if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('status')}}
    </div>
    @endif
    @csrf
    <div class="form-group row">
        <label for="id_tecnico" class="col-md-4 col-form-label text-md-right">Trabajador: </label>
        <!-- div trabajador -->
        <div>
            {{ Auth::user()->persona->nombre }} {{ Auth::user()->persona->apellido_paterno }}
        </div>
    </div>
    <!-- <br> -->
    <!-- Marcado -->
    <!-- @if (Auth()->user()->id_rol == 1)
                        @else -->

    @php
    $marcado = DB::table('control_trabajos')
    ->where('id_trabajo_asignado', $marcar_control_trabajos->id)
    ->where('fecha', date('Y-m-d'))
    ->where('hora_fin', null)
    ->first();
    @endphp

    @if (is_null($marcado))
    <div>
        <form action="{{url('/marcar_control_trabajos')}}" method="POST">
            @csrf
            <input type="hidden" name="id_tecnico" value="{{ Auth::user()->persona->id }}">
            <!-- input trabajo requerido -->
            <input type="hidden" name="id_trabajo_asignado" value="{{ $marcar_control_trabajos->id }}">
            <input type="hidden" name="tipo" value="entrada">
            <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
            <input type="hidden" name="hora_inicio" value="<?php date_default_timezone_set("America/New_York");
                                                            echo date("H:i:s"); ?>" name="hora_inicio" id='hora_inicio'>

            <div class="col-5">
                <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
            </div>
            <br>
            <div class="col-5">
                <input type="hidden" class="form-control" placeholder="lng" name="lng" id="lng">
            </div>
            <br>

            <input type="hidden" class="form-control" placeholder="distancia" name="distancia" id="distancia">

            <!-- bootstrap buuton green -->
            <button type="submit" class="btn btn-success" onclick="getDistanciaMetros()">
                Marcar horario de entrada
            </button>
        </form>

    </div>
    @endif

    @if (is_null($marcado))
    <div>
        @else
        <label for="">Usted Marco su entrada a las: {{ $marcado->hora_inicio }}</label>
        <form action="{{ route('marcar_control_trabajos', $marcado->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_trabajo_asignado" value="{{ $marcar_control_trabajos->id }}">
            <input type="hidden" name="id_tecnico" value="{{ Auth::user()->persona->id }}">
            <input type="hidden" name="hora_fin" value="<?php date_default_timezone_set("America/New_York");
                                                        echo date("H:i:s"); ?>" id="hora_fin">

            <div>Tus coordenas:</div>
            <div class="col-5">
                <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
            </div>
            <br>
            <div class="col-5">
                <input type="hidden" class="form-control" placeholder="lng" name="lng" id="lng">
            </div>
            <br>

            <!-- bootstrap button red -->
            <button type="submit" class="btn btn-danger">
                Marcar horario de salida
            </button>
        </form>
    </div>
    @endif
    <!-- @endif -->
    <!-- coordenadas cliente -->


    <br>
    @csrf
    <div class="mapform">
        <div id="map"></div>
        <script>
            let map, activeInfoWindow, markers = [];
            let lat2;
            let lng2;
            let lat1;
            let lng1;
            /* ----------------------------- Initialize Map ----------------------------- */
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: -17.78629,
                        lng: -63.18117,
                    },
                    zoom: 15
                });

                map.addListener("click", function(event) {
                    mapClicked(event);
                });

                initMarkers();
            }

            /* --------------------------- Initialize Markers --------------------------- */
            function initMarkers() {

                /* Devuelve la direccion(Formato Addres) de coordenadas */
                const geocoder = new google.maps.Geocoder();
                const latlng = new google.maps.LatLng(28.625043, 79.810135);
                const request = {
                    latLng: latlng
                }
                geocoder.geocode(request, results => {
                    if (results.length) {
                        console.log(results[0].formatted_address);
                    }
                });

                const formulario = @json($coordenasCliente);
                /* let  */
                lat2 = parseFloat(formulario.latitude);
                /* let  */
                lng2 = parseFloat(formulario.longitude);
                let marker2 = new google.maps.Marker({
                    position: {
                        lat: lat2,
                        lng: lng2
                    },
                    icon: {
                        url: "{{ asset('images/location.png') }}",
                        scaledSize: new google.maps.Size(50, 50)
                    },
                    map: map,
                    animation: google.maps.Animation.DROP
                });
                const infoWindow = new google.maps.InfoWindow({
                    content: '<h6>Cliente</h6>',
                });
                infoWindow.open(map, marker2);
                markers.push(marker2);



                /* geo location */
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(position => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(pos);
                        console.log(pos);
                        lat1 = pos.lat;
                        console.log(lat1);
                        lng1 = pos.lng;
                        console.log(lng1);
                        document.getElementById('lat').value = pos.lat;
                        document.getElementById('lng').value = pos.lng;
                        markers.push(new google.maps.Marker({
                            position: pos,
                            map: map,
                            title: "Mi ubicacion",
                            icon: {
                                url: "{{ asset('images/google-maps.png') }}",
                                scaledSize: new google.maps.Size(50, 50)
                            },
                        }));
                    }, () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

            }

            function getDistanciaMetros() {

                rad = function(x) {
                    return x * Math.PI / 180;
                }
                var R = 6378.137; //Radio de la tierra en km 
                var dLat = rad(lat2 - lat1);
                /* console.log(dLat); */
                var dLong = rad(lng2 - lng1);
                /* console.log(dLong); */
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(rad(lat1)) *
                    Math.cos(rad(lat2)) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
                /* console.log(a); */
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                console.log(c);

                //aquí obtienes la distancia en metros por la conversion 1Km =1000m
                var d = R * c * 1000;
                console.log(d.toFixed(3));
                document.getElementById('distancia').value = d.toFixed(3);
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtBE9UAI6NcVr_uKbS8GytFUhhi65CiM&callback=initMap" type="text/javascript"></script>
    </div>

    <br>
    <!-- button home -->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset">
            <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection