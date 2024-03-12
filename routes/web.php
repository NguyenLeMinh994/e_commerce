<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart',[App\Http\Controllers\ProductController::class, 'cart'])->name("cart");
Route::get('/cart/add/{idProduct}',[App\Http\Controllers\ProductController::class, 'addToCart'])->name("addToCart");
Route::get('/cart/remove/{idProduct}',[App\Http\Controllers\ProductController::class, 'removeToCart'])->name("removeToCart");


Route::post('/check-out', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name("checkout");
Route::get('/history-order', [App\Http\Controllers\CheckoutController::class, 'getListHistoryOrder'])->name("history.order");

Route::get('/products',[App\Http\Controllers\ProductController::class, 'index'])->name("product");
Route::get('/products/{id}/detail',[App\Http\Controllers\ProductController::class, 'detailProdcut'])->name("product.detail");



