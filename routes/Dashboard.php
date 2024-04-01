<?php

use App\Http\Controllers\AboutAppController;
use App\Http\Controllers\AdditionalPackageController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CouponController;
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

Route::group(['middleware' => ['check_user:1', 'lang']], function () {
    //// Admin&Support
    Route::post('addAdminSupport', [AdminController::class, 'addAdminSupport']);

    /////// Category
    Route::get('searchCategories', [CategoryController::class, 'searchCategory']); /// Get And Search
    Route::get('categoryWithFilter', [CategoryController::class, 'categoryWithFilter']);
    Route::get('statistics', [CategoryController::class, 'statistics']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::post('categories/{categoryId}', [CategoryController::class, 'update']);
    Route::delete('categories/{categoryId}', [CategoryController::class, 'delete']);

    ////// Filter
    Route::get('filters', [FilterController::class, 'index']);
    Route::get('categories/{categoryId}/filters', [FilterController::class, 'getFilterByCategory']);
    Route::post('filters', [FilterController::class, 'store']);
    Route::patch('filters/{filterId}', [FilterController::class, 'update']);
    Route::get('filter/{filterId}', [FilterController::class, 'show']);
    Route::delete('filters/{filterId}', [FilterController::class, 'delete']);

    /////// Offers
    Route::post('offers', [OffersController::class, 'store']);
    Route::patch('offers/{offerId}', [OffersController::class, 'update']);
    Route::get('offer/{offerId}', [OffersController::class, 'show']);
    Route::delete('offers/{offerId}', [OffersController::class, 'delete']);

    /////// Template
    Route::get('searchTemplate', [TemplateController::class, 'searchTemplate']);
    Route::post('templates', [TemplateController::class, 'store']);
    Route::post('templates/{templateId}', [TemplateController::class, 'update']);
    Route::get('template/{templateId}', [TemplateController::class, 'show']);
    Route::delete('templates/{templateId}', [TemplateController::class, 'delete']);

    ////// Package
    Route::post('packages', [PackageController::class, 'store']);
    Route::patch('packages/{packageId}', [PackageController::class, 'update']);
    Route::get('package/{packageId}', [PackageController::class, 'show']);
    Route::delete('packages/{packageId}', [PackageController::class, 'delete']);

    ////// Package Details
    Route::post('packageDetails', [PackageDetalisController::class, 'store']);
    Route::patch('packageDetails/{packageDetailsId}', [PackageDetalisController::class, 'update']);
    Route::get('packageDetails/{packageId}', [PackageDetalisController::class, 'getPackageDetailsByPackageId']);
    Route::delete('packageDetails/{packageDetailsId}', [PackageDetalisController::class, 'delete']);

    ////// Services
    Route::post('services', [ServicesController::class, 'store']);
    Route::post('services/{serviceId}', [ServicesController::class, 'update']);
    Route::get('service/{serviceId}', [ServicesController::class, 'show']);
    Route::delete('services/{serviceId}', [ServicesController::class, 'delete']);

    ///// Terms And Conditions
    Route::post('terms', [TermController::class, 'store']);
    Route::patch('terms/{termId}', [TermController::class, 'update']);
    Route::get('term/{termId}', [TermController::class, 'show']);
    Route::delete('terms/{termId}', [TermController::class, 'delete']);

    ////  Privacy Policy
    Route::post('privacyPolicy', [PrivacyPolicyController::class, 'store']);
    Route::patch('privacyPolicy/{Id}', [PrivacyPolicyController::class, 'update']);
    Route::get('privacyPolicy/{Id}', [PrivacyPolicyController::class, 'show']);
    Route::delete('privacyPolicy/{Id}', [PrivacyPolicyController::class, 'delete']);

    ////  AboutApp
    Route::post('about_apps', [AboutAppController::class, 'store']);
    Route::patch('about_apps/{Id}', [AboutAppController::class, 'update']);
    Route::get('about_apps/{Id}', [AboutAppController::class, 'show']);
    Route::delete('about_apps/{Id}', [AboutAppController::class, 'delete']);

    ////  Contact Us
    Route::post('contactUs', [ContactUsController::class, 'store']);
    Route::patch('contactUs/{Id}', [ContactUsController::class, 'update']);
    Route::delete('contactUs/{Id}', [ContactUsController::class, 'delete']);

    ////  FAQ
    Route::post('faq', [FAQController::class, 'store']);
    Route::patch('faq/{Id}', [FAQController::class, 'update']);
    Route::get('faq/{Id}', [FAQController::class, 'show']);
    Route::delete('faq/{Id}', [FAQController::class, 'delete']);

    ///// Inputs
    Route::get('categories/{categoryId}/inputs', [InputController::class, 'index']);
    Route::post('inputs', [InputController::class, 'store']);
    Route::patch('inputs/{inputId}', [InputController::class, 'update']);
    Route::delete('inputs/{inputId}', [InputController::class, 'delete']);

    /////  Validate
    Route::get('validates', [ValidateController::class, 'index']);
    Route::post('validates', [ValidateController::class, 'store']);
    Route::patch('validates/{validateId}', [ValidateController::class, 'update']);
    Route::delete('validates/{validateId}', [ValidateController::class, 'delete']);

    //// Prohibited Thing
    Route::post('prohibitedThing', [ProhibitedThingController::class, 'store']);
    Route::patch('prohibitedThing/{prohibitedThingId}', [ProhibitedThingController::class, 'update']);
    Route::get('prohibitedThing/{prohibitedThingId}', [ProhibitedThingController::class, 'show']);
    Route::delete('prohibitedThing/{prohibitedThingId}', [ProhibitedThingController::class, 'delete']);

    ////  Additional Package
    Route::post('additionalPackage', [AdditionalPackageController::class, 'store']);
    Route::patch('additionalPackage/{Id}', [AdditionalPackageController::class, 'update']);
    Route::delete('additionalPackage/{Id}', [AdditionalPackageController::class, 'delete']);

    ////  Coupon
    Route::get('coupons', [CouponController::class, 'index']);
    Route::post('coupons', [CouponController::class, 'store']);
    Route::patch('coupons/{couponId}', [CouponController::class, 'update']);
    Route::get('coupon/{couponId}', [CouponController::class, 'show']);
    Route::delete('coupons/{couponId}', [CouponController::class, 'delete']);

});
