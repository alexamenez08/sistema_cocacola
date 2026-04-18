<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1><b>Colecciones</b></h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('colecciones.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Nueva colección
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>AÑO</th>
                <th>DESCRIPCIÓN</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colecciones as $coleccion)
            <tr>
                <td>{{ $coleccion->id }}</td>
                <td>{{ $coleccion->nombre }}</td>
                <td>{{ $coleccion->anio }}</td>
                <td>{{ $coleccion->descripcion }}</td>
                <td>
                    <a href="{{ route('colecciones.edit', $coleccion) }}">
                        <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                    </a>

                    <form action="{{ route('colecciones.destroy', $coleccion) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar colección?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection
</body>
</html>