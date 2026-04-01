<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

    <h1><i class="fa-regular fa-pen-to-square"></i> <b>EDITAR SOUVENIR:</b> {{ $souvenir->nombre }}</h1>

    <form action="{{ route('souvenirs.update', $souvenir) }}" method="POST">
        @csrf
        @method('PUT')

        <input value="{{ $souvenir->nombre }}" type="text" name="nombre" placeholder="Nombre" class="form-control">
        <br>
        <input value="{{ $souvenir->precio }}" type="number" name="precio" placeholder="Precio" class="form-control">
        <br>
        <input value="{{ $souvenir->stock }}" type="number" name="stock" placeholder="Stock" class="form-control">
        <br>
        <input value="{{ $souvenir->descripcion }}" type="text" name="descripcion" placeholder="Descripción" class="form-control">
        <br>
        <input value="{{ $souvenir->categoria }}" type="text" name="categoria" placeholder="Categoría" class="form-control">
        <br>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar cambios</button>
    </form>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('souvenirs.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-ban"></i> Regresar
        </a>
    </div>

    @endsection
</body>
</html>