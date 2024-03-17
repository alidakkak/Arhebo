<?php

use App\Http\Controllers\AboutAppController;
use App\Http\Controllers\AdditionalPackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageDetalisController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ProhibitedThingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\ValidateController;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'check_user:1'], function () {
    /////// Category
    Route::post('categories', [CategoryController::class, 'store']);
    Route::post('categories/{categoryId}', [CategoryController::class, 'update']);
    Route::delete('categories/{categoryId}', [CategoryController::class, 'delete']);

    ////// Filter
    Route::get('filters', [FilterController::class, 'index']);
    Route::post('filters', [FilterController::class, 'store']);
    Route::post('filters/{filterId}', [FilterController::class, 'update']);
    Route::delete('filters/{filterId}', [FilterController::class, 'delete']);

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
    Route::post('services/{serviceId}', [ServicesController::class, 'update']);
    Route::delete('services/{serviceId}', [ServicesController::class, 'delete']);

    ///// Terms And Conditions
    Route::post('terms', [TermController::class, 'store']);
    Route::post('terms/{termId}', [TermController::class, 'update']);
    Route::delete('terms/{termId}', [TermController::class, 'delete']);

    ////  Privacy Policy
    Route::post('privacyPolicy', [PrivacyPolicyController::class, 'store']);
    Route::post('privacyPolicy/{Id}', [PrivacyPolicyController::class, 'update']);
    Route::delete('privacyPolicy/{Id}', [PrivacyPolicyController::class, 'delete']);

    ////  AboutApp
    Route::post('about_apps', [AboutAppController::class, 'store']);
    Route::post('about_apps/{Id}', [AboutAppController::class, 'update']);
    Route::delete('about_apps/{Id}', [AboutAppController::class, 'delete']);

    ////  Contact Us
    Route::post('contactUs', [ContactUsController::class, 'store']);
    Route::post('contactUs/{Id}', [ContactUsController::class, 'update']);
    Route::delete('contactUs/{Id}', [ContactUsController::class, 'delete']);

    ////  FAQ
    Route::post('faq', [FAQController::class, 'store']);
    Route::post('faq/{Id}', [FAQController::class, 'update']);
    Route::delete('faq/{Id}', [FAQController::class, 'delete']);

    ///// Inputs
    Route::get('inputs', [InputController::class, 'index']);
    Route::post('inputs', [InputController::class, 'store']);
    Route::post('inputs/{inputId}', [InputController::class, 'update']);
    Route::delete('inputs/{inputId}', [InputController::class, 'delete']);

    /////  Validate
    Route::get('validates', [ValidateController::class, 'index']);
    Route::post('validates', [ValidateController::class, 'store']);
    Route::post('validates/{validateId}', [ValidateController::class, 'update']);
    Route::delete('validates/{validateId}', [ValidateController::class, 'delete']);

    //// Prohibited Thing
    Route::post('prohibitedThing', [ProhibitedThingController::class, 'store']);
    Route::post('prohibitedThing/{prohibitedThingId}', [ProhibitedThingController::class, 'update']);
    Route::delete('prohibitedThing/{prohibitedThingId}', [ProhibitedThingController::class, 'delete']);

    ////  Additional Package
    Route::post('additionalPackage', [AdditionalPackageController::class, 'store']);
    Route::post('additionalPackage/{Id}', [AdditionalPackageController::class, 'update']);
    Route::delete('additionalPackage/{Id}', [AdditionalPackageController::class, 'delete']);

});
