<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ctrlDatos extends Controller
{
    protected function externalUrl()
    {
        return env('REMOTE_APP_URL', 'https://uprr-itiid.github.io/u2-ed-cc-202300080/');
    }

    protected function fetchRemoteJson()
    {
        try {
            $url = $this->externalUrl();
            $response = Http::timeout(10)->get($url);
            
            if ($response->successful()) {
                $data = $response->json();
                return is_array($data) ? $data : [];
            }
        } catch (\Exception $e) {
        }
        return [];
    }

    public function AccesoDatosVista()
    {
        $pro = Product::all();

        return view('vistadatos')->with(compact('pro'));
    }

    public function AccesoDatosVistaLink()
    {
        $enlace = $this->fetchRemoteJson();

        return view('profile.vistadatoslink')->with(compact('enlace'));
    }

    public function AccesoDatosSitio()
    {
        $enlace = Http::get('https://juanramondominiocarros.netlify.app/json/carros.json');
        $traductor = $enlace->json();
        return view('iti')->with(compact('traductor'));
    }

    public function AccesoDetalleSitio($id)
    {
        $enlace = Http::get('https://juanramondominiocarros.netlify.app/json/carros.json');
        $traductor = $enlace->json();
        $carro = collect($traductor)->firstWhere('id', (int) $id);
        return view('iti_detalle')->with(compact('carro'));
    }

    public function AccesoCatalogo()
    {
        $categorias = \App\Models\Category::with('products')->get();

        return view('catalogo')->with(compact('categorias'));
    }

    public function AccesoCategorias()
    {
        $categorias = \App\Models\Category::all();

        return view('categorias')->with(compact('categorias'));
    }

    public function AgregarCategoria()
    {
        return view('categorias_agregar');
    }

    public function GuardarCategoria(Request $request)
    {
        \App\Models\Category::create($request->only(['name', 'description']));
        return redirect('/categorias');
    }

    public function EditarCategoria($id)
    {
        $categoria = \App\Models\Category::findOrFail($id);
        return view('categorias_editar')->with(compact('categoria'));
    }

    public function ActualizarCategoria(Request $request, $id)
    {
        $categoria = \App\Models\Category::findOrFail($id);
        $categoria->update($request->only(['name', 'description']));
        return redirect('/categorias');
    }

    public function EliminarCategoria($id)
    {
        \App\Models\Category::findOrFail($id)->delete();
        return redirect('/categorias');
    }

    public function AccesoProductos()
    {
        $productos = Product::all();
        return view('productos')->with(compact('productos'));
    }

    public function AgregarProducto()
    {
        return view('productos_agregar');
    }

    public function GuardarProducto(Request $request)
    {
        Product::create($request->only(['name', 'description', 'descriptionLong', 'price', 'category_id']));
        return redirect('/productos');
    }

    public function EditarProducto($id)
    {
        $producto = Product::findOrFail($id);
        return view('productos_editar')->with(compact('producto'));
    }

    public function ActualizarProducto(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $producto->update($request->only(['name', 'description', 'descriptionLong', 'price', 'category_id']));
        return redirect('/productos');
    }

    public function EliminarProducto($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/productos');
    }
}