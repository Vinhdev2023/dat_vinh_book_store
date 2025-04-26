<?php

use App\Http\Controllers\AdminCartController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPublisherController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->middleware('CheckAdmin')->group(function (){
    Route::get('/', [AdminHomeController::class, 'index']);
    Route::withoutMiddleware('CheckAdmin')->group(function (){
        Route::get('/login', [AdminHomeController::class, 'login_form']);
        Route::post('/login/post', [AdminHomeController::class, 'login']);
        Route::get('/logout', [AdminHomeController::class, 'logout'])   ;
    });

    Route::get('/statistics', [StatisticController::class, 'statistic_view']);
    Route::post('/statistics/get-data', [StatisticController::class, 'statistic_get_data']);

    Route::get('/product-to-cart/{id}', [AdminCartController::class, 'index']);
    Route::post('/add-to-cart/{id}', [AdminCartController::class, 'add_to_cart']);
    Route::get('/product-in-cart/{id}', [AdminCartController::class, 'product_in_cart']);
    Route::post('/update-cart/{id}', [AdminCartController::class, 'update_cart']);
    Route::get('/clear-cart/', [AdminCartController::class, 'clear_cart']);
    Route::get('/add-order/', [AdminCartController::class, 'add_order_form']);
    Route::post('/add-order-post/', [AdminCartController::class, 'add_order_post']);
    Route::get('/order/repair/{id}', [AdminCartController::class, 'order_repair_form']);
    Route::post('/order/repair-post/{id}', [AdminCartController::class, 'order_repair_post']);

    Route::get('/orders', [AdminOrderController::class, 'index']);
    Route::get('/orders/filter/{status}', [AdminOrderController::class, 'orders_filter']);
    Route::get('/order/detail/{id}', [AdminOrderController::class, 'order_detail']);
    Route::get('/order/update/{status}/{id}', [AdminOrderController::class, 'update_order']);

    Route::get('/products', [AdminProductController::class, 'index']);
    Route::get('/product/detail/{id}', [AdminProductController::class, 'product_detail']);
    Route::get('/product/add-form', [AdminProductController::class, 'add_form']);
    Route::post('/product/add', [AdminProductController::class, 'add_product']);
    Route::get('/product/edit-form/{id}', [AdminProductController::class, 'edit_form']);
    Route::post('/product/update/{id}', [AdminProductController::class, 'edit_product']);
    Route::get('/product/delete/{id}', [AdminProductController::class, 'delete_product']);
    Route::get('/products/empty', [AdminProductController::class, 'products_empty']);


    Route::get('/categories', [AdminCategoryController::class, 'index']);
    Route::get('/category/add-form', [AdminCategoryController::class, 'add_form']);
    Route::post('/category/add', [AdminCategoryController::class, 'add_category']);
    Route::get('/category/edit-form/{id}', [AdminCategoryController::class, 'edit_form']);
    Route::post('/category/update/{id}', [AdminCategoryController::class, 'edit_category']);
    Route::get('/category/delete/{id}', [AdminCategoryController::class, 'delete_category']);

    Route::get('/publishers', [AdminPublisherController::class, 'index']);
    Route::get('/publisher/add-form', [AdminPublisherController::class, 'add_form']);
    Route::post('/publisher/add', [AdminPublisherController::class, 'add_publisher']);
    Route::get('/publisher/edit-form/{id}', [AdminPublisherController::class, 'edit_form']);
    Route::post('/publisher/update/{id}', [AdminPublisherController::class, 'edit_publisher']);
    Route::get('/publisher/delete/{id}', [AdminPublisherController::class, 'delete_publisher']);
});

