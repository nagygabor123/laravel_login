<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductRequest;


/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::post('/users/login', [Users::class, 'login']);
Route::get('/users', [Users::class, 'index'])->middleware('auth:sanctum');
Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products', [ProductsController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/products/{id}', [ProductsController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->middleware('auth:sanctum');