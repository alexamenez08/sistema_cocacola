<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuario</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('users.index') }}" class="btn btn-outline-dark">
                <i class="fa-regular fa-circle-left"></i> Regresar
            </a>
    </div>

    <h1><i class="fa-solid fa-download"></i> <b>Agregar nuevo usuario</b></h1>

    <form action="{{  route('users.store') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen"></i></span>
            <input type="text" name="name" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
            <input type="email" name="email" placeholder="Correo electrónico" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
            <input type="text" name="phone" placeholder="Número de teléfono" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="password" placeholder="Contraseña" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></i></span>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control">
        </div>

        <div class="form-check">
            <input type="checkbox" name="is_admin" value="1">
            <label for="is_admin">Es administrador</label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-user-check"></i></i> Registrar usuario</button>
    </form>

    @endsection
    
</body>
</html>