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
<!-- Create show asistencia -->
<h2 class="card-header">{{ __('Asistencias') }}</h2>
<!-- Message -->
@if(Session::has('Mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('Mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- button home -->
<div>
    <a href="{{url('/asistencias')}}" class="button">Volver</a>
</div>

<table class="table table-night table-hover">
    <thead class="thead-night">
        <tr>
            <th>#</th>
            <th>Tecnico</th>
            <th>Fecha</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$asistencia->id}}</td>
            <td>{{$asistencia->tecnico->persona->nombre}} {{$asistencia->tecnico->persona->apellido_paterno}}</td>
            <td>{{$asistencia->fecha}}</td>
            <td>{{$asistencia->hora_inicio}}</td>
            <td>{{$asistencia->hora_fin}}</td>
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
            const asistencia = @json($asistencia);
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
            const asistencia = @json($asistencia);
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

@endsection