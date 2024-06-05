<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\ProductController;


Route::get('/', [ClientIndexController::class, 'clientIndex']);
Route::get('/products', [ProductController::class, 'products']);
Route::get('/product/detail/{id}', [ProductController::class, 'product_detail']);

Route::post('/product-to-cart/{id}', [CartController::class, 'add_cart']);
Route::get('/clear/cart', [CartController::class, 'clear_cart']);



Route::get('/sign-up', function () {
    return view('CustomerPages.SignInAndSignUp.SignUp');
});

Route::get('/sign-in', function () {
    return view('CustomerPages.SignInAndSignUp.SignIn');
});

require __DIR__.'/web_admin.php';

