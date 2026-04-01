<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('acceso') }}" class="btn btn-success me-3">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar sesión
        </a>
    </div>

    @include('partials.alerts')

    <h1>REGISTRO</h1>

    <form action="{{ route('registro.store') }}" method="POST">
        <!--OBLIGATORIO-->
        @csrf

        <input type="text" name="name" placeholder="Nombre" class="form-control">
        <br>
        <input type="email" name="email" placeholder="Email" class="form-control">
        <br>
        <input type="text" name="phone" placeholder="Teléfono" class="form-control">
        <br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
        <br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control">
        <br>

        <!-- <div class="form-check">
            <input type="checkbox" name="is_admin" value="1">
            <label for="is_admin">Es administrador</label>
        </div> -->

        <button type="submit">Guardar</button>

    </form>

    @endsection
</body>
</html>