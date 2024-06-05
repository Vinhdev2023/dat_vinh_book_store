<?php

use App\Http\Controllers\AuthCusController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\ProductController;


Route::get('/', [ClientIndexController::class, 'clientIndex']);
Route::get('/products', [ProductController::class, 'products']);
Route::get('/product/detail/{id}', [ProductController::class, 'product_detail']);

Route::post('/product-to-cart/{id}', [CartController::class, 'add_cart']);
Route::get('/clear/cart', [CartController::class, 'clear_cart']);
Route::get('/checkout', [CartController::class, 'checkout']);

Route::get('/checkout-form', [CartController::class, 'checkout_form']);

Route::get('/sign-up', function () {
    return view('CustomerPages.SignInAndSignUp.SignUp');
});
Route::post('/sign-up/post', [AuthCusController::class, 'sign_up']);

Route::get('/sign-in', function () {
    return view('CustomerPages.SignInAndSignUp.SignIn');
});
Route::post('/sign-in/post', [AuthCusController::class, 'sign_in']);

Route::get('/sign-out', [AuthCusController::class,'sign_out']);

require __DIR__.'/web_admin.php';

