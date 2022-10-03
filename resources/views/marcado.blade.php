@extends('inicio')
@section('marcado', 'is-active')

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
<div class="card-body">
    <h2>Marcar Horario</h2>
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
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @csrf
    <div class="form-group row">
        <!-- div trabajador -->
        <div>
            Trabajador: {{ Auth::user()->persona->nombre }} {{ Auth::user()->persona->apellido_paterno }}
        </div>
    </div>
    <!-- <br> -->
    <!-- Marcado -->
    <!-- @if (Auth()->user()->id_rol == 1)
                        @else -->

    @php
    $marcado = DB::table('asistencias')
    ->where('id_tecnico', Auth::user()->persona->id)
    ->where('fecha', date('Y-m-d'))
    ->where('hora_fin', null)
    ->first();
    @endphp

    @if (is_null($marcado))
    <div>
        <form action="{{ route('marcarEntrada') }}" method="POST">
            @csrf
            <input type="hidden" name="id_tecnico" value="{{ Auth::user()->persona->id }}">
            <input type="hidden" name="tipo" value="entrada">
            <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
            <input type="hidden" name="hora_inicio" value="<?php date_default_timezone_set("America/New_York");
                                                            echo date("H:i:s"); ?>" name="hora_inicio" id='hora_inicio'>

            <div hidden>Tus coordenas:</div>
            <div class="col-5" hidden>
                <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                <br>
            </div>

            <div class="col-5" hidden>
                <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                <br>
            </div>

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
        <form action="{{ route('marcarSalida', $marcado->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_tecnico" value="{{ Auth::user()->persona->id }}">
            <input type="hidden" name="tipo" value="salida">
            <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
            <input type="hidden" name="hora_fin" value="<?php date_default_timezone_set("America/New_York");
                                                        echo date("H:i:s"); ?>" id="hora_fin">

            <div hidden>Tus coordenas:</div>
            <div class="col-5" hidden>
                <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                <br>
            </div>

            <div class="col-5" hidden>
                <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                <br>
            </div>

            <!-- bootstrap button red -->
            <button type="submit" class="btn btn-danger">
                Marcar horario de salida
            </button>
        </form>
        @endif
    </div>
    <!-- @endif -->

    <!-- button home -->
    <a href="{{ route('inicio') }}" style="margin: 20px;" class="button">Volver</a>
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

            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtBE9UAI6NcVr_uKbS8GytFUhhi65CiM&callback=initMap" type="text/javascript"></script>
    </div>
</div>
@endsection