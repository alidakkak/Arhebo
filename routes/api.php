<?php

use App\Http\Controllers\AboutAppController;
use App\Http\Controllers\AdditionalPackageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailOTP\EmailVerificationsController;
use App\Http\Controllers\Auth\EmailOTP\ForgetPasswordController;
use App\Http\Controllers\Auth\EmailOTP\ResetPasswordController;
use App\Http\Controllers\Auth\WhatsAppOTP\WhatsAppVerificationsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InviteeController;
use App\Http\Controllers\NicknameController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ProhibitedThingController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TestInvitationController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//// Package
Route::get('packages', [PackageController::class, 'index']);
////  Contact us
Route::get('contactUs', [ContactUsController::class, 'index']);
/// Category
Route::get('categories', [CategoryController::class, 'index']);

Route::get('/showInvitationInfo/{invitee}', [InviteeController::class, 'showInvitationInfo']);
Route::group(['middleware' => 'lang'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/emailVerifications', [EmailVerificationsController::class, 'emailVerification']);
//    Route::post('/Verifications', [ResetPasswordController::class, 'emailVerification']);
//    Route::post('forget-password', [ForgetPasswordController::class, 'forgetPassword']);
//    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);

    Route::post('/whatsAppVerification', [WhatsAppVerificationsController::class, 'whatsAppVerification']);
    Route::post('/Verifications', [ResetPasswordController::class, 'emailVerification']);
    Route::post('forget-password', [ForgetPasswordController::class, 'forgetPassword']);
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);

});
Route::group(['middleware' => ['check_user:1,2', 'lang']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('updateProfile/{user}', [AuthController::class, 'update']);
    Route::post('deleteProfile', [AuthController::class, 'delete']);

    //////// Category
    Route::get('categories/{category}', [CategoryController::class, 'show']);

    ////  Filters
    Route::get('filters/{categoryId}', [FilterController::class, 'getFilterByCategory']);

    ///// Offers
    Route::get('offers', [OffersController::class, 'index']);

    //// Template
    Route::get('templates', [TemplateController::class, 'index']);
    Route::get('trendingNew', [TemplateController::class, 'trending']);

    //// Services
    Route::get('services', [ServicesController::class, 'index']);

    ////  Privacy Policy
    Route::get('privacyPolicy', [PrivacyPolicyController::class, 'index']);

    ////  AboutApp
    Route::get('about_apps', [AboutAppController::class, 'index']);

    ////  FAQ
    Route::get('faq', [FAQController::class, 'index']);

    //// Wishlist
    Route::get('wishlists', [WishlistController::class, 'index']);
    Route::post('wishlists', [WishlistController::class, 'store']);
    // Route::patch('wishlists/{wishlist}', [WishlistController::class, 'switch']);
    Route::delete('wishlists/{template}', [WishlistController::class, 'delete']);

    //// Rating
    Route::get('ratings', [RatingController::class, 'index']);
    Route::post('ratings', [RatingController::class, 'store']);
    Route::delete('ratings/{rating}', [RatingController::class, 'delete']);

    //// Invitation
    Route::get('invitations', [InvitationController::class, 'myEvent']);
    Route::get('invitations/{invitation}', [InvitationController::class, 'showEvent']);
    Route::get('event', [InvitationController::class, 'myInvitation']);
    Route::post('invitations', [InvitationController::class, 'store']);
    Route::post('invitations/{invitationId}', [InvitationController::class, 'delete']);
    Route::post('invitationUpdate/{invitationId}', [InvitationController::class, 'update']);
    Route::get('/history', [InvitationController::class, 'history']);

    //// Payment
    Route::post('/payments', [PaymentController::class, 'handlePayment']);

    //// Coupon
    Route::post('checkCoupon', [CouponController::class, 'checkCoupon']);

    ////  Invitee
    Route::get('invitees', [InviteeController::class, 'index']);
    Route::post('addInvitees', [InviteeController::class, 'addInvitees']);

    ////  Reminder
    Route::post('reminders', [ReminderController::class, 'store']);

    ////  Reception
    Route::get('receptions', [ReceptionController::class, 'search']);
    Route::get('receptionsEvent', [ReceptionController::class, 'myEvent']);
    Route::get('receptionsEvent/{Id}', [ReceptionController::class, 'myEventById']);
    Route::post('receptions', [ReceptionController::class, 'store']);
    Route::delete('receptionsDelete', [ReceptionController::class, 'delete']);
    Route::get('receptionList', [ReceptionController::class, 'receptionList']);
    Route::post('scanQRCodeForInvitee', [ReceptionController::class, 'scanQRCodeForInvitee']);

    //// Prohibited Thing
    Route::get('prohibitedThing', [ProhibitedThingController::class, 'index']);

    ////  Additional Package
    Route::get('additionalPackage', [AdditionalPackageController::class, 'index']);
    Route::post('additionalInvitee', [AdditionalPackageController::class, 'additionalInvitee']);

    ////  Nickname
    Route::get('nicknames', [NicknameController::class, 'index']);

});

///// Terms And Conditions
Route::get('terms', [TermController::class, 'index']);
//// Test Invitation
Route::post('testInvitation', [TestInvitationController::class, 'testInvitation']);
