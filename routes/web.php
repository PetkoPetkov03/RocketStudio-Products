<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'show_index']);
Route::get('/products/create', [ProductController::class, 'show_create']);
Route::post('/products/create', [ProductController::class, 'post_create']);
