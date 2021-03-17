<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/orders',[\App\Http\Controllers\MainController::class, 'index'])->name('orders');
Route::middleware(['auth:sanctum', 'verified'])->get('/orders/{id}',[\App\Http\Controllers\MainController::class, 'edit'])->name('ordersedit');
Route::middleware(['auth:sanctum', 'verified'])->get('/orders/update/{id}',[\App\Http\Controllers\MainController::class, 'update'])->name('ordersupdate');
Route::middleware(['auth:sanctum', 'verified'])->get('/orders/delete/{id}',[\App\Http\Controllers\MainController::class, 'destroy'])->name('ordersdestroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/products',[\App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::middleware(['auth:sanctum', 'verified'])->get('/products/add',[\App\Http\Controllers\ProductController::class, 'create'])->name('productsadd');
Route::middleware(['auth:sanctum', 'verified'])->get('/products/store',[\App\Http\Controllers\ProductController::class, 'store'])->name('productsstore');
Route::middleware(['auth:sanctum', 'verified'])->get('/products/{id}',[\App\Http\Controllers\ProductController::class, 'edit'])->name('productsedit');
Route::middleware(['auth:sanctum', 'verified'])->get('/products/update/{id}',[\App\Http\Controllers\ProductController::class, 'update'])->name('productsupdate');
Route::middleware(['auth:sanctum', 'verified'])->get('/products/delete/{id}',[\App\Http\Controllers\ProductController::class, 'destroy'])->name('productsdestroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/counteragents',[\App\Http\Controllers\CounteragentController::class, 'index'])->name('counteragents');
Route::middleware(['auth:sanctum', 'verified'])->get('/counteragents/add',[\App\Http\Controllers\CounteragentController::class, 'create'])->name('counteragentsadd');
Route::middleware(['auth:sanctum', 'verified'])->get('/counteragents/store',[\App\Http\Controllers\CounteragentController::class, 'store'])->name('counteragentsstore');
Route::middleware(['auth:sanctum', 'verified'])->get('/counteragents/{id}',[\App\Http\Controllers\CounteragentController::class, 'edit'])->name('counteragentsedit');
Route::middleware(['auth:sanctum', 'verified'])->get('/counteragents/update/{id}',[\App\Http\Controllers\CounteragentController::class, 'update'])->name('counteragentsupdate');
Route::middleware(['auth:sanctum', 'verified'])->get('/counteragents/delete/{id}',[\App\Http\Controllers\CounteragentController::class, 'destroy'])->name('counteragentsdestroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
