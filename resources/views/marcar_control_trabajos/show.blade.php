@extends('layouts.app')

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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                    <br>
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

                            <div>Tus coordenas:</div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                            </div>
                            <br>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                            </div>
                            <br>
                            <!-- bootstrap buuton green -->
                            <button type="submit" class="btn btn-success">
                                Marcar horario de entrada
                            </button>
                        </form>

                    </div>
                    @endif

                    <div>
                        @if (is_null($marcado))
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
                                <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                            </div>
                            <br>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                            </div>
                            <br>

                            <!-- bootstrap button red -->
                            <button type="submit" class="btn btn-danger">
                                Marcar horario de salida
                            </button>
                        </form>
                        @endif
                    </div>
                    <!-- @endif -->

                    <br>
                    @csrf
                    <div class="mapform">
                        <div id="map"></div>
                        <script>
                            let map, activeInfoWindow, markers = [];
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
                                        markers.push(new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            title: "Mi ubicacion",
                                            icon: {
                                                url: "{{ asset('images/google-maps.png') }}",
                                                scaledSize: new google.maps.Size(50, 50)
                                            },
                                            /* label: {
                                                color: "red",
                                                text: "YO",
                                            }, */
                                        }));
                                    }, () => {
                                        handleLocationError(true, infoWindow, map.getCenter());
                                    });
                                } else {
                                    // Browser doesn't support Geolocation
                                    handleLocationError(false, infoWindow, map.getCenter());
                                }

                                /* Marker on click */
                                /* google.maps.event.addListener(drawingManager, 'markercomplete', function(marker) {
                                    var lat = marker.getPosition().lat();
                                    var lng = marker.getPosition().lng();
                                    console.log(lat, lng);
                                }); */

                            }

                            /* Ve detalles de lugares con ubicacion, retorna sus coordenadas
                            retorna coordenadas al hacer click a un lugar */
                            /* ------------------------- Handle Map Click Event ------------------------- */
                            function mapClicked(event) {
                                console.log(map);
                                console.log(event.latLng.lat(), event.latLng.lng());
                            }

                            /* Retorna las coordenadas de los Markers que no se puedan mover */
                            /* ------------------------ Handle Marker Click Event ----------------------- */
                            function markerClicked(marker, index) {
                                console.log(map);
                                console.log(marker.position.lat());
                                console.log(marker.position.lng());
                            }

                            /* Retorna coordenadas de todos las Markers que se muevan */
                            /* ----------------------- Handle Marker DragEnd Event ---------------------- */
                            function markerDragEnd(event, index) {
                                console.log(map);
                                console.log(event.latLng.lat());
                                console.log(event.latLng.lng());
                            }

                            /* GPS tiempo real */
                            /* ----------------------------- Handle GPS Event ----------------------------- */
                            function gpsEvent(event) {
                                console.log(event.coords.latitude);
                                console.log(event.coords.longitude);
                            }
                            /* geo location */
                            /* ----------------------------- Handle Geo Event ----------------------------- */
                            function geoEvent(event) {
                                console.log(event.coords.latitude);
                                console.log(event.coords.longitude);
                            }

                            function suma() {
                                var a = 1;
                                var b = 2;
                                var c = a + b;
                                var resultado = document.getElementById("suma");
                                resultado.innerHTML = c;
                            }

                            function coordenadas() {
                                var latitud = 28.626137;
                                var longitud = 79.821603;
                                var coordenadas = document.getElementById("coordenadas");
                                coordenadas.innerHTML = "Latitud: " + latitud + " Longitud: " + longitud;
                            }

                            function ubicacion() {
                                /* geo location */
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(position => {
                                        const pos = {
                                            lat: position.coords.latitude,
                                            lng: position.coords.longitude
                                        };
                                        map.setCenter(pos);
                                        var ubicacion = document.getElementById("ubicacion");
                                        ubicacion.innerHTML = "Latitud: " + pos.lat + " Longitud: " + pos.lng;
                                        console.log(pos);
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

                    <br>
                    <!-- button home -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset">
                            <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection