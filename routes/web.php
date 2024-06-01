<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;


Route::get('/', [ClientIndexController::class, 'clientIndex']);
Route::get('/publisher', [PublisherController::class, 'publishers']);
Route::get('/contact', [ContactController::class, 'contact']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/products', [ProductController::class, 'products']);
Route::get('/productDetail', [ProductController::class, 'productDetail']);



Route::get('/sign-up', function () {
    return view('CustomerPages.SignInAndSignUp.SignUp');
});

Route::get('/sign-in', function () {
    return view('CustomerPages.SignInAndSignUp.SignIn');
});

require __DIR__.'/web_admin.php';

