<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPublisherController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function (){
    Route::get('/', [AdminHomeController::class, 'index']);

    Route::get('/products', [AdminProductController::class, 'index']);

    Route::get('/categories', [AdminCategoryController::class, 'index']);

    Route::get('/publishers', [AdminPublisherController::class, 'index']);
});

