<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OffersController;
use Illuminate\Support\Facades\Route;

/////// Category
Route::post('categories', [CategoryController::class, 'store']);
Route::post('categories/{category}', [CategoryController::class, 'update']);
Route::delete('categories/{category}', [CategoryController::class, 'delete']);

/////// Offers
Route::post('offers', [OffersController::class, 'store']);
Route::post('offers/{offer}', [OffersController::class, 'update']);
Route::delete('offers/{offer}', [OffersController::class, 'delete']);
