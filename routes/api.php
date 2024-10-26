<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartsController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/product-categories', [ProductCategoryController::class, 'index']);
Route::post('/add-category', [ProductCategoryController::class,'store']);

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Products Route
Route::get('/products', [ProductsController::class,'index']);
Route::get('/product/{id}', [ProductsController::class,'product']);
Route::get('/products/{category_id}', [ProductsController::class,'productsByCategory']);

// Carts Route
Route::get('/all-carts', [CartsController::class, 'index']);
Route::get('/carts/{user_id}', [CartsController::class, 'getUserActiveCart']);
Route::get('/carts/{user_id}/{category_id}', [CartsController::class, 'getUserActiveCartCategoryWise']);
Route::post('/add-cart', [CartsController::class, 'addProductToUserCart']);
Route::delete('/carts/{user_id}/{category_id}', [CartsController::class, 'deleteCartForSpecificProduct']);
Route::delete('/carts/{user_id}', [CartsController::class, 'emptyCartUser']);