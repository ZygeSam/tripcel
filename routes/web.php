<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsimController;
use App\Http\Controllers\EsimProductController;
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
Route::get('/', [EsimProductController::class, 'index'])->name('home');
Route::get('/countries', [EsimProductController::class, 'getCountries'])->name('countries');
Route::get('/regions/{region}', [EsimProductController::class, 'getRegionProducts'])->name('regions');
Route::get('/countries/{country}', [EsimProductController::class, 'getCountryProducts'])->name('country');
Route::get('/cart', [EsimProductController::class, 'showCart'])->name('showCart');
Route::get('/countries/{country}/addtoCart/{esimProduct}', [EsimProductController::class, 'addToCart'])->name('cart');
Route::get('/countries/removeFromCart/{esimProduct}', [EsimProductController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/countries/removeFromCartIcon/{esimProduct}', [EsimProductController::class, 'removeFromCartIcon'])->name('cartIcon.remove');
Route::get('/checkout', [EsimProductController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [EsimProductController::class, 'buyProduct'])->name('buyProduct');
Route::get('confirmPayment/{gateway}/{email}', [EsimProductController::class, 'confirmPayment'])->name('confirmPayment');
Route::post('/store', [EsimController::class, 'store']);
Route::get('/products', [EsimProductController::class, 'index']);
Route::get('/products/{esimProduct}', [EsimProductController::class, 'show']);
