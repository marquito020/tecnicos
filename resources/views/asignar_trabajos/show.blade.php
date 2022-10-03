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

<!-- index formulario -->
<h1>Asignar Tecnico a Formulario</h1>
<!-- button crear formulario -->
<!-- button volver -->

<a href="{{ url('home') }}" class="button">Volver</a>

<table class="table table-night">
    <thead class="thead-night">
        <tr>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Servicio</th>
            <th>Cliente</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $formulario->descripcion }}</td>
            <td>{{ $formulario->fecha }}</td>
            <td>{{ $formulario->hora }}</td>
            <td>{{ $formulario->estado }}</td>
            <td>{{ $formulario->servicio->nombre }}</td>
            <td>{{ $formulario->cliente->persona->nombre }}</td>
        </tr>
    </tbody>
</table>
<form action="{{url('/asignar_trabajos')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlSelect1">Tecnico</label>
        <select class="form-control" id="exampleFormControlSelect1" name="id_tecnico">
            @foreach($tecnicos as $tecnico)
            <option value="{{ $tecnico->id }}">{{ $tecnico->persona->nombre }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <!-- input formulario -->
    <input type="hidden" name="id_formulario_cliente" value="{{$formulario->id}}">
    <!-- input administrativo -->
    <input type="hidden" name="id_administrativo" value="{{Auth::user()->id}}">
    <!-- button crear formulario -->
    <div class="btn btn-success">
        <button type="submit" class="btn btn-success">Asignar Tecnico</button>
    </div>
    <!-- estado -->
    <input type="hidden" name="estado" value="Asignado">
</form>
<br>
<div id="map"></div>
<script>
    let map, activeInfoWindow, markers = [];
    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        /* base de datos asistencia */
        const formulario = @json($formulario);
        let lat = parseFloat(formulario.latitude);
        let lng = parseFloat(formulario.longitude);
        /* console.log(lat);
        console.log(lng); */
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: lat,
                lng: lng
            },
            zoom: 15
        });

        initMarkers();
    }

    function initMarkers() {

        /* base de datos asistencia */
        /* const tecnicos = @json($tecnicos); */
        const tecnicos = <?php echo json_encode($tecnicos); ?>;
        const personas = <?php echo json_encode($personas); ?>;
        for (let i = 0; i < tecnicos.length; i++) {
            let lat = parseFloat(tecnicos[i].latitude);
            let lng = parseFloat(tecnicos[i].longitude);
            /* console.log(lat);
            console.log(lng); */
            let marker2 = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                /* icon blue */
                icon: {
                    url: "{{ asset('images/location.png') }}",
                    scaledSize: new google.maps.Size(50, 50)
                },
                map: map,
                animation: google.maps.Animation.DROP
            });

            let nombre;
            for (let j = 0; j < personas.length; j++) {
                let id = parseInt(personas[j].id);
                if (id == parseInt(tecnicos[i].id)) {
                    nombre = personas[j].nombre;
                }
            }
            console.log(nombre);

            const infoWindow = new google.maps.InfoWindow({
                content: nombre,
            });
            infoWindow.open(map, marker2);
            markers.push(marker2);
        }

        const formulario = @json($formulario);
        let lat2 = parseFloat(formulario.latitude);
        let lng2 = parseFloat(formulario.longitude);
        let marker2 = new google.maps.Marker({
            position: {
                lat: lat2,
                lng: lng2
            },
            icon: {
                url: "{{ asset('images/google-maps.png') }}",
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

    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVtBE9UAI6NcVr_uKbS8GytFUhhi65CiM&callback=initMap" type="text/javascript"></script>

@endsection