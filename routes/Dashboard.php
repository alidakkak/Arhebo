<?php

use App\Http\Controllers\AboutAppController;
use App\Http\Controllers\AdditionalPackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ProhibitedThingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TermController;
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
    Route::post('templates', [TemplateController::class, 'store']);
    Route::delete('templates/{template}', [TemplateController::class, 'delete']);

    ////// Package
    Route::post('packages', [PackageController::class, 'store']);

    ////// Services
    Route::post('services', [ServicesController::class, 'store']);

    ///// Terms And Conditions
    Route::post('terms', [TermController::class, 'store']);

    ////  Privacy Policy
    Route::post('privacyPolicy', [PrivacyPolicyController::class, 'store']);

    ////  AboutApp
    Route::post('about_apps', [AboutAppController::class, 'store']);

    ////  FAQ
    Route::post('faq', [FAQController::class, 'store']);

    ///// Inputs
    Route::post('inputs', [InputController::class, 'store']);
    Route::delete('inputs/{Id}', [InputController::class, 'delete']);

    //// Prohibited Thing
    Route::post('prohibitedThing', [ProhibitedThingController::class, 'store']);

    ////  Additional Package
    Route::post('additionalPackage', [AdditionalPackageController::class, 'store']);

});
