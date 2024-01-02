<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvitationRequest;
use App\Http\Resources\InvitationResource;
use App\Models\Invitation;
use App\Models\InvitationInput;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function myInvitation() {
        $user = auth()->user();
        $invitation = Invitation::where('id', $user->id)->get();
        return InvitationResource::collection($invitation);
    }

    public function store(StoreInvitationRequest $request) {
        $user = auth()->user();
        try {
            $invitation = Invitation::create(array_merge(['user_id' => $user->id], $request->all()));
            foreach ($request->answers as $answer) {
            InvitationInput::create([
               'invitation_id' => $invitation->id,
                'input_id' => $answer['input_id'],
                'answer' => $answer['answer']
            ]);
            }
            return InvitationResource::make($invitation);
        } catch (\Exception $e) {
            return response(['message' => 'An error occurred while creating the invitation' . '  ' . $e->getMessage()],500);
        }
    }

}
