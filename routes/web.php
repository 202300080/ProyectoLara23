<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ctrlDatos;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/datos', [ctrlDatos::class, 'AccesoDatosVista']);
Route::get('/datoslink', [ctrlDatos::class, 'AccesoDatosVistaLink']);
Route::get('/sitio', [ctrlDatos::class, 'AccesoDatosSitio']);
Route::get('/sitio/{id}', [ctrlDatos::class, 'AccesoDetalleSitio']);

Route::get('/detalle-api', [ctrlDatos::class, 'AccesoDetalleApi']);

Route::get('/catalogo', [ctrlDatos::class, 'AccesoCatalogo']);
Route::get('/productos', [ctrlDatos::class, 'AccesoProductos']);
Route::get('/productos/agregar', [ctrlDatos::class, 'AgregarProducto']);
Route::post('/productos/guardar', [ctrlDatos::class, 'GuardarProducto']);
Route::get('/productos/{id}/editar', [ctrlDatos::class, 'EditarProducto']);
Route::put('/productos/{id}/actualizar', [ctrlDatos::class, 'ActualizarProducto']);
Route::delete('/productos/{id}/eliminar', [ctrlDatos::class, 'EliminarProducto']);

Route::get('/categorias', [ctrlDatos::class, 'AccesoCategorias']);
Route::get('/categorias/agregar', [ctrlDatos::class, 'AgregarCategoria']);
Route::post('/categorias/guardar', [ctrlDatos::class, 'GuardarCategoria']);
Route::get('/categorias/{id}/editar', [ctrlDatos::class, 'EditarCategoria']);
Route::put('/categorias/{id}/actualizar', [ctrlDatos::class, 'ActualizarCategoria']);
Route::delete('/categorias/{id}/eliminar', [ctrlDatos::class, 'EliminarCategoria']);

require __DIR__.'/auth.php';
