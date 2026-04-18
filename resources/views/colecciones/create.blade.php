<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Colección</title>
</head>
<body>

    @extends('layouts.app')
    @section('content')

    <h1><b>Registrar nueva Colección</b></h1>

    <form action="{{ route('colecciones.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
            <input type="integer" name="anio" placeholder="Año" class="form-control">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="descripcion" placeholder="Descripción" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-regular fa-paper-plane"></i> Guardar
        </button>
    </form>

    @endsection
</body>
</html>