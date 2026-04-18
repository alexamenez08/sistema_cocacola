<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1><i class="fa-regular fa-pen-to-square"></i> <b>EDITAR USUARIO:</b> {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <input value="{{ $user->name }}" type="text" name="name" placeholder="Nombre" class="form-control">
        <br>
        <input value="{{ $user->email }}" type="email" name="email" placeholder="Email" class="form-control">
        <br>
        <input value="{{ $user->phone }}" type="text" name="phone" placeholder="Teléfono" class="form-control">
        <br>
        <div class="form-check">
            <input value="{{ $user->is_admin }}" type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
            <label for="is_admin">Es administrador</label>
        </div>
        <br>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar cambios</button>
    </form>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('users.index') }}" class="btn btn-danger">
            <i class="fa-regular fa-circle-left"></i> Regresar
        </a>
    </div>

    @endsection
    
</body>
</html>