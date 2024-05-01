<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InviteeController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::patch('invitees/{invitee}', [InviteeController::class, 'update']);
Route::group(['middleware' => ['check_user:1,3', 'lang']], function () {
    ////  Invitee
    Route::post('invitees', [InviteeController::class, 'store']);

    ////  Reminder
    Route::get('reminders', [ReminderController::class, 'index']);

    ////  Orders Invitation
    Route::get('orders', [InvitationController::class, 'index']);
    Route::get('showOrders/{invitationId}', [InvitationController::class, 'showOrders']);

    ////  Template By Code
    Route::get('templateByCode', [TemplateController::class, 'templateByCode']);
});
Route::post('sendMessage', [InviteeController::class, 'sendWhatsAppMessages']);
