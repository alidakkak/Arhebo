<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApologyRequest;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use App\Http\Resources\ApologyResource;
use App\Http\Resources\InvitationResource;
use App\Models\Invitation;
use App\Models\InvitationInput;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function myInvitation() {
        $user = auth()->user();
        $invitation = Invitation::where('user_id', $user->id)->get();
        return InvitationResource::collection($invitation);
    }

    public function myEvent() {

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


    public function update(UpdateInvitationRequest $request, $invitationId) {
        $user = auth()->user();
        $invitation = Invitation::where('user_id', $user->id)->find($invitationId);

        if (!$invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }

        try {
            DB::beginTransaction();
//            $message = Message::create([
//                'user_id' => $user->id,
//                'invitation_id' =>$invitation->id,
//                'title' => $request->title
//            ]);
            $invitation->update($request->all());
            foreach ($request->answers as $answer) {
                $invitationInput = InvitationInput::where('invitation_id', $invitation->id)
                    ->where('input_id', $answer['input_id'])
                    ->first();
                if ($invitationInput) {
                    $invitationInput->update(['answer' => $answer['answer']]);
                } else {
                    InvitationInput::create([
                        'invitation_id' => $invitation->id,
                        'input_id' => $answer['input_id'],
                        'answer' => $answer['answer']
                    ]);
                }
            }
            DB::commit();
            return InvitationResource::make($invitation);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'An error occurred while updating the invitation: ' . $e->getMessage()], 500);
        }
    }


    public function delete(StoreApologyRequest $request, $invitationId) {
        $invitation = Invitation::find($invitationId);
        if (!$invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }
        $user = auth()->user();
        $message = Message::where('user_id', $user->id)->where('invitation_id', $invitation->id)->first();
        if($message) {
            return response()->json(['message' => 'Invitation is Inactive']);
        }else {
            try {
                DB::beginTransaction();
                $invitationId = $invitation->id;
                $apology = Message::create(array_merge(['user_id' => $user->id, 'invitation_id' => $invitationId], $request->all()));
                $invitation->update([
                    'is_active' => 0
                ]);
                DB::commit();
                return ApologyResource::make($apology);
            } catch (\Exception $e) {
                DB::rollBack();
                return response(['message' => 'An error occurred while deleting the invitation and creating the apology message' . '  ' . $e->getMessage()], 500);
            }
        }

    }


}
