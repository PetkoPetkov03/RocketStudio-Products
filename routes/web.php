<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'show_index'])->name('products');
Route::get('/products/create', [ProductController::class, 'show_create'])->name('products.create');
Route::post('/products/create', [ProductController::class, 'post_create'])->name('products.create.action');
Route::get('/products/buy', [ProductController::class, 'show_buyform_product'])->name('products.buy');
Route::post('products/buy', [ProductController::class, 'buy_product'])->name('products.buy.action');
Route::get('/products/overview', [ProductController::class, 'show_overview'])->name('products.overview');
Route::get('/products/{id}', [ProductController::class, 'display_product'])->name('products.get');
