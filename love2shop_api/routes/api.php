<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API is not authenticated for now, would 100% need implementation in a production system
Route::resource('orders', OrderController::class);
