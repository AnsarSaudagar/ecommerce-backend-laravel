<?php

use App\Http\Controllers\Api\ProductCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/product-categories', [ProductCategoryController::class, 'index']);
Route::post('/product', [ProductCategoryController::class,'store']);
