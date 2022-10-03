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
<!-- Create show asistencia -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- button home -->
            <a href="{{url('/formularioClientes')}}" class="btn btn-primary">Volver</a>
            <br />
            <br />

            <!-- Message -->
            @if(Session::has('Mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('Mensaje')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Asistencias') }}</div>
                <div class="card-body">
                    <table class="table table-light table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Servicio</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$formularioCliente->id}}</td>
                                <td>{{ $formularioCliente->descripcion }}</td>
                                <td>{{ $formularioCliente->fecha }}</td>
                                <td>{{ $formularioCliente->hora }}</td>
                                <td>{{ $formularioCliente->estado }}</td>
                                <td>{{ $formularioCliente->servicio->nombre }}</td>
                                <td>{{ $formularioCliente->cliente->persona->nombre }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mapform">
                        <div id="map"></div>
                        <script>
                            let map, activeInfoWindow, markers = [];
                            /* ----------------------------- Initialize Map ----------------------------- */
                            function initMap() {
                                /* base de datos asistencia */
                                const asistencia = @json($formularioCliente);
                                let lat = parseFloat(asistencia.latitude);
                                let lng = parseFloat(asistencia.longitude);
                                map = new google.maps.Map(document.getElementById("map"), {
                                    center: {
                                        lat: lat,
                                        lng: lng
                                    },
                                    zoom: 15
                                });

                                map.addListener("click", function(event) {
                                    mapClicked(event);
                                });

                                initMarkers();
                            }

                            function initMarkers() {
                                /* base de datos asistencia */
                                const asistencia = @json($formularioCliente);
                                let lat = parseFloat(asistencia.latitude);
                                let lng = parseFloat(asistencia.longitude);
                                let marker = new google.maps.Marker({
                                    position: {
                                        lat: lat,
                                        lng: lng
                                    },
                                    map: map,
                                    draggable: true,
                                    animation: google.maps.Animation.DROP
                                });
                                markers.push(marker);
                                marker.addListener("click", function() {
                                    markerClicked(marker);
                                });
                                marker.addListener("dragend", function() {
                                    markerDragEnd(marker);
                                });
                            }
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtBE9UAI6NcVr_uKbS8GytFUhhi65CiM&callback=initMap" type="text/javascript"></script>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection