<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminHomeController::class, 'index']);

Route::get('/admin/products', [AdminProductController::class, 'index']);
