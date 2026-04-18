<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuarios</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

        <h1> <i class="fa-solid fa-user-check"></i> <b>Usuarios registrados</b> </h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('users.create') }}" class="btn btn-success me-3">
            <i class="fa-solid fa-plus"></i> Registrar nuevo usuario
        </a>

        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary me-3">
            <i class="fa-regular fa-circle-left"></i>Regresar al panel
        </a>
    </div>
    
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>TELÉFONO</th>
                <th>PERMISOS</th>
                <th>ACCIONES</th>          
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

                <tr>

                    <td> {{ $user->id }}</td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td> {{ $user->phone }}</td>
                    <td> {{ $user->is_admin }}</td>
                    <td> 
                        <a href="{{ route('users.edit', $user) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">  
                            @csrf
                            @method('DELETE')
                            <button
                            class="btn btn-danger"
                            onclick="return confirm('¿ELiminar el usuario?')">
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