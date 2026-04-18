<?php

namespace App\Http\Controllers;

use App\Models\Coleccion;
use App\Models\Collection;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colecciones = Coleccion::all();
        return view('colecciones.index', compact('colecciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colecciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'anio' => 'required|integer|min:1800|max:' . date('Y'),
            'descripcion' => 'required',
        ]);

        Coleccion::create($request->all());

        return redirect()->route('colecciones.index')
        ->with('success', 'Colección creada con éxito');
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
    public function edit(Coleccion $coleccion)
    {
        return view('colecciones.edit', compact('coleccion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coleccion $coleccion)
    {
        $request->validate([
            'nombre' => 'required',
            'anio' => 'required|integer|min:1800|max:' . date('Y'),
            'descripcion' => 'required',
        ]);

        $coleccion->update($request->all());

        return redirect()->route('colecciones.index')
        ->with('success', 'Colección actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coleccion $coleccion)
    {
        $coleccion->delete();
        return redirect()->route('colecciones.index')
        ->with('success', 'Colección eliminada con éxito');
    }
}
