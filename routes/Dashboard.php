<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TemplateController;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'check_user:1'], function () {
/////// Category
Route::post('categories', [CategoryController::class, 'store']);
Route::post('categories/{category}', [CategoryController::class, 'update']);
Route::delete('categories/{category}', [CategoryController::class, 'delete']);

/////// Offers
Route::post('offers', [OffersController::class, 'store']);
Route::post('offers/{offer}', [OffersController::class, 'update']);
Route::delete('offers/{offer}', [OffersController::class, 'delete']);

/////// Template
Route::post('templates', [TemplateController::class,'store']);

////// Package
Route::post('packages', [PackageController::class, 'store']);
});
