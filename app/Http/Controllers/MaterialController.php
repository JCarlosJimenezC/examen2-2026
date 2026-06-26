<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unidadMedida'       => 'required|string',
            'descripcion'        => 'required|string',
            'ubicacion'          => 'required|string',
            'categoria.nombre'   => 'required_without:idCategoria|string',
            'idCategoria'        => 'required_without:categoria|integer|exists:categorias,idCategoria',
        ]);

        if (isset($validated['categoria'])) {
            $categoria = Categoria::create(['nombre' => $validated['categoria']['nombre']]);
            $idCategoria = $categoria->idCategoria;
        } else {
            $idCategoria = $validated['idCategoria'];
        }

        $material = Material::create([
            'unidadMedida' => $validated['unidadMedida'],
            'descripcion'  => $validated['descripcion'],
            'ubicacion'    => $validated['ubicacion'],
            'idCategoria'  => $idCategoria,
        ]);

        return response()->json($material->load('categoria'), 201);
    }

    public function update(Request $request, int $codigo)
    {
        $validated = $request->validate([
            'unidadMedida' => 'sometimes|required|string',
            'descripcion'  => 'sometimes|required|string',
            'ubicacion'    => 'sometimes|required|string',
            'idCategoria'  => 'sometimes|required|integer|exists:categorias,idCategoria',
        ]);

        $material = Material::findOrFail($codigo);
        $material->update($validated);

        return response()->json($material->load('categoria'));
    }
}
