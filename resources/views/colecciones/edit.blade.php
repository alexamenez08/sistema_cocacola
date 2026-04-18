<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar colección</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1><b>Editar Colección:</b> {{ $coleccion->nombre }}</h1>

    <form action="{{ route('colecciones.update', $coleccion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input value="{{ $coleccion->nombre }}" type="text" name="nombre" class="form-control">
        </div>
        <div class="input-group mb-3">
            <input value="{{ $coleccion->anio }}" type="integer" name="anio" class="form-control">
        </div>
        <div class="input-group mb-3">
            <input value="{{ $coleccion->descripcion }}" type="text" name="descripcion" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk"></i> Guardar cambios
        </button>
    </form>

    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('colecciones.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-ban"></i> Regresar
        </a>
    </div>

    @endsection
</body>
</html>