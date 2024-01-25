<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InviteeController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'check_user:1,3'], function () {
    ////  Invitee
    Route::post('invitees', [InviteeController::class, 'store']);
    Route::patch('invitees/{invitee}', [InviteeController::class, 'update']);

    ////  Reminder
    Route::get('reminders', [ReminderController::class, 'index']);

    ////  Orders Invitation
    Route::get('orders', [InvitationController::class, 'index']);
    Route::get('showOrders', [InvitationController::class, 'showOrders']);
});
