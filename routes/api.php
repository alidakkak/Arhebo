<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('emailVerification',[EmailVerifyController::class,'emailVerification']);
Route::post('forget-password',[ForgetPasswordController::class,'forgetPassword']);
Route::post('reset-password',[ResetPasswordController::class,'resetPassword']);

Route::group(['middleware' => 'check_user:2,1'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('updateProfile/{user}', [AuthController::class, 'update']);

    //////// Category
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);

    ///// Offers
    Route::get('offers', [OffersController::class, 'index']);

    //// Template
    Route::get('templates',[TemplateController::class,'index']);
    Route::get('trendingNew',[TemplateController::class,'trending']);

    //// Package
    Route::get('packages', [PackageController::class, 'index']);

    //// Services
    Route::get('services', [ServicesController::class, 'index']);

    ///// Terms And Conditions
    Route::get('terms', [TermController::class, 'index']);

    ////  Privacy Policy
    Route::get('privacyPolicy', [PrivacyPolicyController::class, 'index']);

    //// Wishlist
    Route::get('wishlists', [WishlistController::class, 'index']);
    Route::post('wishlists', [WishlistController::class, 'store']);
    Route::patch('wishlists/{wishlist}', [WishlistController::class, 'switch']);
    Route::delete('wishlists/{wishlist}', [WishlistController::class, 'delete']);

    //// Rating
    Route::get('ratings', [RatingController::class, 'index']);
    Route::post('ratings', [RatingController::class, 'store']);
    Route::delete('ratings/{rating}', [RatingController::class, 'delete']);

    //// Invitation
    Route::get('invitations', [InvitationController::class, 'myInvitation']);
    Route::post('invitations', [InvitationController::class, 'store']);
});
