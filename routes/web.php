<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product?}', [ProductController::class, 'show'])->name('products.show');
Route::delete('/products/{product?}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::patch('/products/{product?}', [ProductController::class, 'update'])->name('products.update');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');