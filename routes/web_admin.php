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
    Route::get('/product/add-form', [AdminProductController::class, 'add_form']);

    Route::get('/categories', [AdminCategoryController::class, 'index']);
    Route::get('/category/add-form', [AdminCategoryController::class, 'add_form']);
    Route::post('/category/add', [AdminCategoryController::class, 'add_category']);
    Route::get('/category/edit-form/{id}', [AdminCategoryController::class, 'edit_form']);
    Route::post('/category/update/{id}', [AdminCategoryController::class, 'edit_category']);

    Route::get('/publishers', [AdminPublisherController::class, 'index']);
    Route::get('/publisher/add-form', [AdminPublisherController::class, 'add_form']);
    Route::post('/publisher/add', [AdminPublisherController::class, 'add_publisher']);
});

