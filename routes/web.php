<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\PublisherController;


Route::get('/', function () {
    return view('CustomerPages.Index');
});

Route::get('/client-index', [ClientIndexController::class,"clientIndex"]);
Route::get('client-index', [PublisherController::class,"publisher"]);

Route::get('/sign-up', function () {
    return view('SignInAndSignUp.SignUp');
});

Route::get('/sign-in', function () {
    return view('SignInAndSignUp.SignIn');
});

require __DIR__.'/web_admin.php';

