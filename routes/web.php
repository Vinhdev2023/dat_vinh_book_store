<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientIndexController;


Route::get('/', [ClientIndexController::class, "clientIndex"]);
