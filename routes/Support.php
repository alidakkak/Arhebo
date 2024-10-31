<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InviteeController;
use App\Http\Controllers\PassKitController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::patch('invitees/{invitee}', [InviteeController::class, 'update']);
Route::group(['middleware' => ['check_user:1,3', 'lang']], function () {
    ////  Invitee
    Route::post('invitees', [InviteeController::class, 'store']);
    Route::get('getImage/{invitationID}', [InviteeController::class, 'getImage']);
    Route::post('storeImage', [InviteeController::class, 'storeImage']);
    Route::get('getInviteeToUpdateSupport/{invitationID}', [InviteeController::class, 'getInviteeToUpdate']);
    Route::patch('updateInviteeSupport', [InviteeController::class, 'updateInvitee']);

    ////  Reminder
    Route::get('reminders', [ReminderController::class, 'index']);
    Route::post('sendWhatsAppReminder/{invitationID}', [ReminderController::class, 'sendWhatsAppReminder']);

    ////  Orders Invitation
    Route::get('orders', [InvitationController::class, 'index']);
    Route::get('showOrders/{invitationId}', [InvitationController::class, 'showOrders']);

    ////  Template By Code
    Route::get('templateByCode', [TemplateController::class, 'templateByCode']);

    ////  Delete User
    Route::get('getUserToDelete', [AdminController::class, 'getUserToDelete']);
    Route::delete('deleteUserForSupport/{userID}', [AdminController::class, 'deleteUserForSupport']);

});

/// PassKit
Route::post('createMember', [PassKitController::class, 'createMember']);
Route::put('updateMember', [PassKitController::class, 'updateMember']);

////  Delete User
Route::post('deleteUser', [AdminController::class, 'deleteUser']);
Route::post('whatsAppVerificationToDeleteUser', [AdminController::class, 'whatsAppVerificationToDeleteUser']);
