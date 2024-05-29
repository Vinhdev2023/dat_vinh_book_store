<?php

use App\Http\Controllers\AdminHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminHomeController::class, 'index']);
