<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriaApiController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());
    }

    public function show($id)
    {
        $categoria = Category::find($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
        ]);

        $categoria = Category::create($request->only(['name', 'description']));

        return response()->json($categoria, 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Category::find($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        $categoria->update($request->only(['name', 'description']));

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Category::find($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();

        return response()->json(['mensaje' => 'Categoría eliminada']);
    }
}
