<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoApiController;
use App\Http\Controllers\CategoriaApiController;

Route::apiResource('productos', ProductoApiController::class);
Route::apiResource('categorias', CategoriaApiController::class);
