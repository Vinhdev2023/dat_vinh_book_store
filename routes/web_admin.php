<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPublisherController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function (){
    Route::get('/', [AdminHomeController::class, 'index']);
    Route::get('/login', [AdminHomeController::class, 'login_form']);
    Route::post('/login/post', [AdminHomeController::class, 'login']);
    Route::get('/logout', [AdminHomeController::class, 'logout']);

    Route::get('/products', [AdminProductController::class, 'index']);
    Route::get('/product/detail/{id}', [AdminProductController::class, 'product_detail']);
    Route::get('/product/add-form', [AdminProductController::class, 'add_form']);
    Route::post('/product/add', [AdminProductController::class, 'add_product']);
    Route::get('/product/edit-form/{id}', [AdminProductController::class, 'edit_form']);
    Route::post('/product/update/{id}', [AdminProductController::class, 'edit_product']);


    Route::get('/categories', [AdminCategoryController::class, 'index']);
    Route::get('/category/add-form', [AdminCategoryController::class, 'add_form']);
    Route::post('/category/add', [AdminCategoryController::class, 'add_category']);
    Route::get('/category/edit-form/{id}', [AdminCategoryController::class, 'edit_form']);
    Route::post('/category/update/{id}', [AdminCategoryController::class, 'edit_category']);

    Route::get('/publishers', [AdminPublisherController::class, 'index']);
    Route::get('/publisher/add-form', [AdminPublisherController::class, 'add_form']);
    Route::post('/publisher/add', [AdminPublisherController::class, 'add_publisher']);
    Route::get('/publisher/edit-form/{id}', [AdminPublisherController::class, 'edit_form']);
    Route::post('/publisher/update/{id}', [AdminPublisherController::class, 'edit_publisher']);
});

