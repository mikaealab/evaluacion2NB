@extends ('layout.app')

@section ('Contenido')

<div class = "container">
    <h1 class = "text-center">Pilotos</h1>
    <a href="{{ route('pilotos.create') }}" class="btn btn-primary">Crear Piloto</a>
    <table class="table table-bordered table-striped table-hover mt-3 ">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Latitud1</th>
                <th>Longitud1</th>
                <th>Hora1</th>
                <th>Latitud2</th>
                <th>Longitud2</th>
                <th>Hora2</th>
                <th>Latitud3</th>
                <th>Longitud3</th>
                <th>Hora3</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilotos as $pilotoTemporal)
                <tr>
                    <td>{{ $pilotoTemporal->dni }}</td>
                    <td>{{ $pilotoTemporal->nombre }}</td>
                    <td>{{ $pilotoTemporal->latitud1 }}</td>
                    <td>{{ $pilotoTemporal->longitud1 }}</td>
                    <td>{{ $pilotoTemporal->hora1 }}</td>
                    <td>{{ $pilotoTemporal->latitud2 }}</td>
                    <td>{{ $pilotoTemporal->longitud2 }}</td>
                    <td>{{ $pilotoTemporal->hora2 }}</td>
                    <td>{{ $pilotoTemporal->latitud3 }}</td>
                    <td>{{ $pilotoTemporal->longitud3 }}</td>
                    <td>{{ $pilotoTemporal->hora3 }}</td>
                    <td>
                        <a href="{{ route('pilotos.edit', $pilotoTemporal) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('pilotos.destroy', $pilotoTemporal) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>    

    </table>
</div>
@endsection