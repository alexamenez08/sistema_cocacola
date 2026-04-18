<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver souvenirs</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <h1> <b>Souvenirs disponibles</b> </h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('souvenirs.create') }}" class="btn btn-success me-3">
            <i class="fa-solid fa-plus"></i> Nuevo souvenir
        </a>

        <a href="{{ route('colecciones.index') }}" class="btn btn-info me-3">
            <i class="fa-solid fa-list"></i> Ver colecciones
        </a>

        <!-- Botón de cerrar sesion -->
        <form action="{{ route('cerrar') }}" method="POSt">
            @csrf
            <button class="btn btn-danger me-3"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</button>
        </form>
        
        @if(auth()->user()->is_admin)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary me-3">
                Panel de administrador
            </a>
        @endif
    </div>

    
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>STOCK</th>
                <th>DESCRIPCION</th>
                <th>CATEGORIA</th> 
                <th>ACCIONES</th>          
            </tr>
        </thead>
        <tbody>
            @foreach ($souvenirs as $souvenir)

                <tr>

                    <td> {{ $souvenir->id }}</td>
                    <td> {{ $souvenir->nombre }}</td>
                    <td> {{ $souvenir->precio }}</td>
                    <td> {{ $souvenir->stock }}</td>
                    <td> {{ $souvenir->descripcion }}</td>
                    <td> {{ $souvenir->categoria }}</td>
                    <td> 
                        <a href="{{ route('souvenirs.edit', $souvenir) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>

                        <form action="{{ route('souvenirs.destroy', $souvenir) }}" method="POST" class="d-inline">  
                            @csrf
                            @method('DELETE')
                            <button
                            class="btn btn-danger"
                            onclick="return confirm('¿ELiminar el registro?')">
                            <i class="fa-solid fa-trash"></i>
                            </button>

                        </form>
                    </td>

                </tr>

            @endforeach
        </tbody>
    </table>

    <h2 class="mt-5"><b>Galería Coca-Cola</b></h2>
    <div class="row mt-3">
        @foreach($imagenes as $imagen)
            <div class="col-md-4 mb-3">
                <img 
                    src="{{ $imagen['urls']['small'] }}" 
                    alt="{{ $imagen['alt_description'] }}"
                    class="img-fluid rounded shadow"
                >
            </div>
        @endforeach
    </div>

    @endsection
</body>
</html>