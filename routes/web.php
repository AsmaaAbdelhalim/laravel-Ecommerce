<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
 Route::resource('product', App\Http\Controllers\ProductController::class);
 Route::resource('category', App\Http\Controllers\CategoryController::class);
 Route::get('/checkout/{productId}', [App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');
 Route::post('/session', [App\Http\Controllers\PaymentController::class, 'session']);
 Route::get('/success', [App\Http\Controllers\PaymentController::class, 'success'])->name('success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
