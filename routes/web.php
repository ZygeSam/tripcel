<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EsimController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\EsimProductController;
use App\Http\Controllers\NetworkController;
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
Route::get('/get-countries', [EsimProductController::class, 'getPageCountries'])->name('getCountries');
Route::get('/countries', [EsimProductController::class, 'getCountries'])->name('countries');
Route::get('/regions/{region}', [EsimProductController::class, 'getRegionProducts'])->name('regions');
Route::post('/destinations', [EsimProductController::class, 'showCountries'])->name('showCountries');
Route::get('/countries/{country}', [EsimProductController::class, 'getCountryProducts'])->name('country');
Route::get('/cart', [EsimProductController::class, 'showCart'])->name('showCart');
Route::get('/countries/{country}/addtoCart/{esimProduct}', [EsimProductController::class, 'addToCart'])->name('cart');
Route::get('/countries/removeFromCart/{esimProduct}', [EsimProductController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/countries/removeFromCartIcon/{esimProduct}', [EsimProductController::class, 'removeFromCartIcon'])->name('cartIcon.remove');
Route::get('/checkout', [EsimProductController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [EsimProductController::class, 'buyProduct'])->name('buyProduct');
Route::get('confirmPayment/{gateway}/{transactionId?}/{email?}', [EsimProductController::class, 'confirmPayment'])->name('confirmPayment');
Route::post('/store', [EsimController::class, 'store']);
Route::get('/products', [EsimProductController::class, 'index']);
Route::get('/products/{esimProduct}', [EsimProductController::class, 'show']);
Route::post('/networks', [NetworkController::class, 'getCountryNetwork'])->name('countryNetwork');
Route::get('/networks/{country?}', [NetworkController::class, 'getNetworkByCountry'])->name('countryCoverage');

Route::get('/getPlans', [CronController::class, 'getEsimPlans'])->name('esimPlans');
Route::post('/paystack-webhook', [EsimProductController::class, 'webhook'])
    ->name('paystackWebHook');
Route::post('/transactioncloud-webhook', [EsimProductController::class, 'transactionCloudWebook'])
    ->name('transactioncloud');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/howitworks', function () {
    return view('pages.howitworks');
})->name('howitworks');

Route::get('/termsncond', function () {
    return view('pages.termsncond');
})->name('termsncond');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/compatibility', function () {
    return view('pages.compatibility');
})->name('compatibility');

// Route::get('/networks', function () {
//     return view('pages.networks');
// })->name('networks');

// Client auth controller
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/fgtPwd', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [AuthController::class, 'PasswordChange'])->name('fgtPwd');
Route::get('passwordUpdate/{email}', [AuthController::class, 'passwordUpdate'])->name('passwordUpdate')->middleware(['signed']);
Route::get('verifyEmail', [EsimProductController::class, 'verifyEmail'])->name('verifyEmail');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');

Route::prefix('client')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get("/", [ClientController::class, 'index'])->name('client.index');
    Route::get("/esim/{userId}", [ClientController::class, 'esim'])->name('esim.index');
    Route::get("/add", [ClientController::class, 'create'])->name('esim.create');
    Route::post("/store", [ClientController::class, 'store'])->name('esim.store');
    Route::get("/topup", [ClientController::class, 'topUp'])->name('esim.topup');
    Route::get("/addToCart", [ClientController::class, 'addToCart'])->name('esim.addToCart');
    Route::get("/addToCartModal", [ClientController::class, 'addToCartModal'])->name('esim.addToCartModal');
    Route::get("/removeFromCart", [ClientController::class, 'removeFromCart'])->name('esim.removeFromCart');
    Route::get("/pay", [ClientController::class, 'pay'])->name('esim.pay');
    Route::post("/sms", [ClientController::class, 'sms'])->name('esim.sms');
    Route::get("/confirmpay/{gateway}/{transactionId}", [ClientController::class, 'confirmPay'])->name('esim.confirmPay');
    Route::get("/checkout", [ClientController::class, 'checkout'])->name('esim.checkout');
    Route::get("/recharge", [ClientController::class, 'recharge'])->name('esim.recharge');
    Route::get("/password", [ClientController::class, 'password'])->name('client.password');
    Route::post("/passwordChange", [ClientController::class, 'changePassword'])->name('client.passwordChange');
    Route::get("/profile", [ClientController::class, 'profile'])->name('client.profile');
    Route::post("/profileUpdate", [ClientController::class, 'saveProfile'])->name('client.profileUpdate');
    Route::get("/cart", [ClientController::class, 'showCart'])->name('client.cart');
    Route::get("/support", [ClientController::class, 'support'])->name('client.support');
    Route::get("/supportTicket/{id}", [ClientController::class, 'getSupportTicket'])->name('ticket.message');
    Route::post("/supportTicket", [ClientController::class, 'supportTicket'])->name('client.supportTicket');
});

// Route::prefix('admin')->group(function () {

//     // Admin auth controller
//     Route::get('/login', [AuthController::class, 'adminLogin'])->name('adminLogin');
//     Route::post('/signin', [AuthController::class, 'adminSignin'])->name('adminSignin');
//     Route::get('/register', [AuthController::class, 'adminRegister'])->name('adminRegister');
//     Route::post('/signup', [AuthController::class, 'adminSignup'])->name('adminSignup');
//     Route::get('/logout', [AuthController::class, 'adminLogout'])->name('adminLogout');

//     Route::get("/", [ClientController::class, 'index'])->name('client.index');
//     Route::get("/esim/{userId}", [ClientController::class, 'esim'])->name('esim.index');
//     Route::get("/add", [ClientController::class, 'create'])->name('esim.create');
//     Route::post("/store", [ClientController::class, 'store'])->name('esim.store');
//     Route::get("/topup", [ClientController::class, 'topUp'])->name('esim.topup');
//     Route::get("/addToCart", [ClientController::class, 'addToCart'])->name('esim.addToCart');
//     Route::get("/removeFromCart", [ClientController::class, 'removeFromCart'])->name('esim.removeFromCart');
//     Route::get("/pay", [ClientController::class, 'pay'])->name('esim.pay');
//     Route::post("/sms", [ClientController::class, 'sms'])->name('esim.sms');
//     Route::get("/confirmpay/{gateway}/{transactionId}", [ClientController::class, 'confirmPay'])->name('esim.confirmPay');
//     Route::get("/checkout", [ClientController::class, 'checkout'])->name('esim.checkout');
//     Route::get("/recharge", [ClientController::class, 'recharge'])->name('esim.recharge');
//     Route::get("/password", [ClientController::class, 'password'])->name('client.password');
//     Route::post("/passwordChange", [ClientController::class, 'changePassword'])->name('client.passwordChange');
//     Route::get("/support", [ClientController::class, 'support'])->name('client.support');
//     Route::get("/supportTicket/{id}", [ClientController::class, 'getSupportTicket'])->name('ticket.message');
//     Route::post("/supportTicket", [ClientController::class, 'supportTicket'])->name('client.supportTicket');

//     Route::get("/profile", [ClientController::class, 'profile'])->name('client.profile');
//     Route::post("/profileUpdate", [ClientController::class, 'saveProfile'])->name('client.profileUpdate');
//     Route::get("/cart", [ClientController::class, 'showCart'])->name('client.cart');
// });

