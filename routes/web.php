<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('CustomerPages.Index');
});

Route::get('/sign-up', function () {
    return view('SignInAndSignUp.SignUp');
});

Route::get('/sign-in', function () {
    return view('SignInAndSignUp.SignIn');
});

require __DIR__.'/web_admin.php';
