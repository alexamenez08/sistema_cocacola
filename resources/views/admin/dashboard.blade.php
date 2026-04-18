<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>DASHBOARD ADMIN</h1>

        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('souvenirs.index') }}" class="btn btn-danger">
                <i class="fa-regular fa-circle-left"></i> Regresar
            </a>
        </div>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Agregar nuevo usuario
        </a>
        <br><br>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-list"></i> Ver todos los usuarios
        </a>

    @endsection
</body>
</html>