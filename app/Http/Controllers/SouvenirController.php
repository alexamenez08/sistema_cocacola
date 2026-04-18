<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//*Modelo
use App\Models\Souvenir;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souvenirs = Souvenir::all();

        // Llamada a la API de Unsplash
        $response = \Illuminate\Support\Facades\Http::get('https://api.unsplash.com/search/photos', [
            'client_id' => config('services.unsplash.access_key'),
            'query' => 'coca-cola',
            'per_page' => 6,
        ]);

        $imagenes = $response->json()['results'] ?? [];

        return view('souvenirs.index', compact('souvenirs', 'imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('souvenirs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //* Usa el modelo para mandar la info a la bd
        Souvenir::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria
        ]);

        return redirect()->route('souvenirs.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Souvenir $souvenir)
    {
        //
        return view('souvenirs.edit', compact('souvenir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Souvenir $souvenir)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
        ]);

        $souvenir->update($request->all());

        return redirect()->route('souvenirs.index')
        ->with('success', 'Actualización exitosa');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Souvenir $souvenir)
    {
        // eliminar registro
        $souvenir -> delete();

        return redirect()->route('souvenirs.index')
        ->with('success', 'Souvenir eliminado');
    }
}
