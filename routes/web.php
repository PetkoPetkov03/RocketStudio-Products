<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'show_index']);
Route::get('/products/create', [ProductController::class, 'show_create']);
Route::post('/products/create', [ProductController::class, 'post_create']);
Route::get('/products/buy', [ProductController::class, 'show_buyform_product']);
Route::post('products/buy', [ProductController::class, 'buy_product']);
Route::get('/products/overview', [ProductController::class, 'show_overview']);
Route::get('/products/{id}', [ProductController::class, 'display_product']);
