@extends('layout.app')

@section('Contenido')

<div class="row">
    <div class="col-md-6">
        <h1 class="text-center">Nuevo Piloto</h1>
        <form action="{{ route('pilotos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            {{-- Coordenada 1 --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <label>COORDENADA 1</label>
                    <label>Latitud:</label>
                    <input type="text" class="form-control" id="latitud1" name="latitud1" required>
                    <label>Longitud:</label>
                    <input type="text" class="form-control" id="longitud1" name="longitud1" required>
                    <label>Hora:</label>
                    <input type="time" class="form-control" id="hora1" name="hora1" required>
                </div>
                <div class="col-md-6">
                    <div id="mapa1" style="width: 100%; height: 300px;"></div>
                </div>
            </div>

            {{-- Coordenada 2 --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <label>COORDENADA 2</label>
                    <label>Latitud:</label>
                    <input type="text" class="form-control" id="latitud2" name="latitud2" required>
                    <label>Longitud:</label>
                    <input type="text" class="form-control" id="longitud2" name="longitud2" required>
                    <label>Hora:</label>
                    <input type="time" class="form-control" id="hora2" name="hora2" required>
                </div>
                <div class="col-md-6">
                    <div id="mapa2" style="width: 100%; height: 300px;"></div>
                </div>
            </div>

            {{-- Coordenada 3 --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <label>COORDENADA 3</label>
                    <label>Latitud:</label>
                    <input type="text" class="form-control" id="latitud3" name="latitud3" required>
                    <label>Longitud:</label>
                    <input type="text" class="form-control" id="longitud3" name="longitud3" required>
                    <label>Hora:</label>
                    <input type="time" class="form-control" id="hora3" name="hora3" required>
                </div>
                <div class="col-md-6">
                    <div id="mapa3" style="width: 100%; height: 300px;"></div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar Piloto</button>
                <button type="button" class="btn btn-success" onclick="graficarPredio()">Graficar Polígono</button>
            </div>
        </form>
    </div>
</div>

{{-- Mapa del Polígono --}}
<div class="row">
    <div class="col-md-12 mt-4">
        <div id="mapa-poligono" style="height: 400px; width: 100%; border: 2px solid blue;"></div>
    </div>
</div>

<script>
    var mapaPoligono;

    function initMap() {
        const centro = new google.maps.LatLng(-0.9374805, -78.6161327);

        // Coordenada 1
        let mapa1 = new google.maps.Map(document.getElementById('mapa1'), {
            center: centro, zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        let marcador1 = new google.maps.Marker({
            position: centro, map: mapa1, draggable: true, title: "Coordenada 1"
        });
        marcador1.addListener('dragend', function () {
            document.getElementById("latitud1").value = this.getPosition().lat();
            document.getElementById("longitud1").value = this.getPosition().lng();
        });

        // Coordenada 2
        let mapa2 = new google.maps.Map(document.getElementById('mapa2'), {
            center: centro, zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        let marcador2 = new google.maps.Marker({
            position: centro, map: mapa2, draggable: true, title: "Coordenada 2"
        });
        marcador2.addListener('dragend', function () {
            document.getElementById("latitud2").value = this.getPosition().lat();
            document.getElementById("longitud2").value = this.getPosition().lng();
        });

        // Coordenada 3
        let mapa3 = new google.maps.Map(document.getElementById('mapa3'), {
            center: centro, zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        let marcador3 = new google.maps.Marker({
            position: centro, map: mapa3, draggable: true, title: "Coordenada 3"
        });
        marcador3.addListener('dragend', function () {
            document.getElementById("latitud3").value = this.getPosition().lat();
            document.getElementById("longitud3").value = this.getPosition().lng();
        });

        // Mapa para polígono
        mapaPoligono = new google.maps.Map(document.getElementById("mapa-poligono"), {
            center: centro, zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    }

    function graficarPredio() {
        const c1 = new google.maps.LatLng(
            parseFloat(document.getElementById('latitud1').value),
            parseFloat(document.getElementById('longitud1').value)
        );
        const c2 = new google.maps.LatLng(
            parseFloat(document.getElementById('latitud2').value),
            parseFloat(document.getElementById('longitud2').value)
        );
        const c3 = new google.maps.LatLng(
            parseFloat(document.getElementById('latitud3').value),
            parseFloat(document.getElementById('longitud3').value)
        );

        const poligono = new google.maps.Polygon({
            paths: [c1, c2, c3],
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#00FF00",
            fillOpacity: 0.35,
        });

        poligono.setMap(mapaPoligono);
    }
</script>

@endsection
