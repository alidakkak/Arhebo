<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApologyRequest;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Resources\InvitationResource;
use App\Models\Invitation;
use App\Models\InvitationInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function myInvitation() {
        $user = auth()->user();
        $invitation = Invitation::where('user_id', $user->id)->get();
        return InvitationResource::collection($invitation);
    }

    public function store(StoreInvitationRequest $request) {
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $invitation = Invitation::create(array_merge(['user_id' => $user->id], $request->all()));
            foreach ($request->answers as $answer) {
            InvitationInput::create([
                'invitation_id' => $invitation->id,
                'input_id' => $answer['input_id'],
                'answer' => $answer['answer']
            ]);
            }
            DB::commit();
            return InvitationResource::make($invitation);
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['message' => 'An error occurred while creating the invitation' . '  ' . $e->getMessage()],500);
        }
    }

    public function delete(StoreApologyRequest $request) {

    }

}
