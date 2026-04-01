<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Insertar</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1><i class="fa-solid fa-download"></i> <b>Agregar nuevo souvenir</b></h1>

    <form action="{{  route('souvenirs.store') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen"></i></span>
            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="text" name="precio" placeholder="Precio" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-list"></i></span>
            <input type="text" name="stock" placeholder="Stock" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-info"></i></span>
            <input type="text" name="descripcion" placeholder="Descripcion" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-folder"></i></span>
            <input type="text" name="categoria" placeholder="Categoria" class="form-control">
        </div>
        <br><br>

        <button type="submit" class="btn btn-outline-secondary"><i class="fa-regular fa-paper-plane"></i>Guardar</button>
    </form>

    @endsection
</body>
</html>