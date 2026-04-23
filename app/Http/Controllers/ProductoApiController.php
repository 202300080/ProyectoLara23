<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show($id)
    {
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'category_id'   => 'required|integer',
        ]);

        $producto = Product::create($request->only([
            'name', 'description', 'descriptionLong', 'price', 'category_id'
        ]));

        return response()->json($producto, 201);
    }

    public function update(Request $request, $id)
    {
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->update($request->only([
            'name', 'description', 'descriptionLong', 'price', 'category_id'
        ]));

        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['mensaje' => 'Producto eliminado']);
    }
}
