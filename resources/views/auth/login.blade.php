<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1><i class="fa-regular fa-circle-user"></i> INICIO DE SESIÓN</h1>
    <form action="" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
            <input type="email" name="email" placeholder="Correo" class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
            <input type="password" name="password" placeholder="Contraseña" class="form-control">
        </div>
        <br>

        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-circle-check"></i> <b>Enviar</b></button>
    </form>

    @endsection
    
</body>
</html>