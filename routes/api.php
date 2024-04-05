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

Route::post('/webhook/storeinfo', [StoreInfoController::class, 'webhookHandler']);
Route::post('/webhook/storeinfo/create', [StoreInfoController::class, 'create']);
Route::put('/webhook/storeinfo/edit/{id}', [StoreInfoController::class, 'edit']);

Route::put('/webhook/storeinfo/update/{id}', [StoreInfoController::class, 'update']);

Route::delete('/webhook/storeinfo/delete/{id}', [StoreInfoController::class, 'delete']);

Route::post('/webhook/category/create', [CategoryController::class, 'create']);
Route::put('/webhook/category/edit/{id}', [CategoryController::class, 'edit']);

Route::patch('/webhook/category/update/{id}', [CategoryController::class, 'update']);

Route::delete('/webhook/category/delete/{id}', [CategoryController::class, 'delete']);

Route::post('/webhook/product/create', [ProductController::class, 'create']);
Route::put('/webhook/product/edit/{id}', [ProductController::class, 'edit']);

Route::patch('/webhook/product/update/{id}', [ProductController::class, 'update']);

Route::delete('/webhook/product/delete/{id}', [ProductController::class, 'delete']);