<?php

use App\Http\Controllers\AboutAppController;
use App\Http\Controllers\AdditionalPackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageDetalisController;
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
    Route::post('categories/{categoryId}', [CategoryController::class, 'update']);
    Route::delete('categories/{categoryId}', [CategoryController::class, 'delete']);

    /////// Offers
    Route::post('offers', [OffersController::class, 'store']);
    Route::post('offers/{offerId}', [OffersController::class, 'update']);
    Route::delete('offers/{offerId}', [OffersController::class, 'delete']);

    /////// Template
    Route::post('templates', [TemplateController::class, 'store']);
    Route::post('templates/{templateId}', [TemplateController::class, 'update']);
    Route::delete('templates/{templateId}', [TemplateController::class, 'delete']);

    ////// Package
    Route::post('packages', [PackageController::class, 'store']);
    Route::post('packages/{packageId}', [PackageController::class, 'update']);
    Route::delete('packages/{packageId}', [PackageController::class, 'delete']);

    ////// Package Details
    Route::post('packageDetails', [PackageDetalisController::class, 'store']);
    Route::post('packageDetails/{packageDetailsId}', [PackageDetalisController::class, 'update']);
    Route::delete('packageDetails/{packageDetailsId}', [PackageDetalisController::class, 'delete']);

    ////// Services
    Route::post('services', [ServicesController::class, 'store']);

    ///// Terms And Conditions
    Route::post('terms', [TermController::class, 'store']);

    ////  Privacy Policy
    Route::post('privacyPolicy', [PrivacyPolicyController::class, 'store']);

    ////  AboutApp
    Route::post('about_apps', [AboutAppController::class, 'store']);

    ////  Contact Us
    Route::post('contactUs', [ContactUsController::class, 'store']);

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
