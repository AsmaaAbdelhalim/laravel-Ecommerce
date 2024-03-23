<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\StoreInfoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('categories', [CategoryController::class , 'index']);
Route::post('categories/{category}',[CategoryController::class , 'show']);
Route::post('products', [ProductController::class , 'index']);
Route::post('products/{product}',[ProductController::class , 'show']);
Route::post('customers', [CustomerController::class , 'index']);
Route::post('customers/{customer}',[CustomerController::class , 'show']);
Route::post('orders', [OrderController::class, 'index']);
Route::post('orders/{order}',[OrderController::class, 'show']);
Route::post('storeinfo', [StoreInfoController::class,'index']);  //

//Route::get('/products/{product}', [ProductController::class, 'show']);


// Route::apiResource('categories', [CategoryController::class , 'index']);
// Route::apiResource("categories/{category}",[CategoryController::class , 'show']);
// Route::apiResource('products', [ProductController::class , 'index']);
// Route::apiResource('products/{product}',[ProductController::class , 'show']);
// Route::apiResource('customers', [CustomerController::class , 'index']);
// Route::apiResource("customers/{customer}",[CustomerController::class , 'show']);
// Route::apiResource('orders', [OrderController::class, 'index']);
// Route::apiResource("orders/{order}",[OrderController::class, 'show']);
// Route::apiResource('storeinfo', [StoreInfoController::class,'index']); 