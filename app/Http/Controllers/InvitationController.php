<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApologyRequest;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use App\Http\Resources\InvitationResource;
use App\Http\Resources\InvitationSupportResource;
use App\Http\Resources\ShowOrdersResource;
use App\Models\Invitation;
use App\Models\InvitationInput;
use App\Models\InvitationProhibited;
use App\Models\Invitee;
use App\Models\Message;
use App\Models\User;
use App\Statuses\InvitationTypes;
use App\Statuses\MessageTypes;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    //// Orders
    public function index()
    {
        $invitation = Invitation::all();

        return InvitationSupportResource::collection($invitation);
    }

    public function showOrders($invitationId)
    {
        $invitation = Invitation::find($invitationId);
        if (! $invitation) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return ShowOrdersResource::make($invitation);
    }

    public function myEvent()
    {
        $user = auth()->user();
        $invitation = Invitation::where('user_id', $user->id)->get();

        return InvitationResource::collection($invitation);
    }

    public function showEvent($invitation)
    {
        $show = Invitation::find($invitation);
        if (! $show) {
            return response()->json(['message' => 'Not Found'], 403);
        }

        return InvitationResource::make($show);
    }

    //// The invitations I was invited on
    public function myInvitation()
    {
        $user = auth()->user();
        $userPhone = User::where('id', $user->id)->select('phone');
        $invitation = Invitee::where('phone', $userPhone)->get();

        return InvitationResource::collection($invitation);
    }

    public function store(StoreInvitationRequest $request)
    {
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $invitation = Invitation::create(array_merge(['user_id' => $user->id], $request->all()));
            foreach ($request->answers as $answer) {
                InvitationInput::create([
                    'invitation_id' => $invitation->id,
                    'input_id' => $answer['input_id'],
                    'answer' => $answer['answer'],
                ]);
            }
            foreach ($request->prohibited as $prohibite) {
                InvitationProhibited::create([
                    'invitation_id' => $invitation->id,
                    'prohibited_thing_id' => $prohibite['prohibited_thing_id'],
                ]);
            }

            DB::commit();

            return InvitationResource::make($invitation);
        } catch (\Exception $e) {
            DB::rollBack();

            return response(['message' => 'An error occurred while creating the invitation'.'  '.$e->getMessage()], 500);
        }
    }
    /*
        public function update(UpdateInvitationRequest $request, $invitationId)
        {
            $user = auth()->user();
            $invitation = Invitation::where('user_id', $user->id)->find($invitationId);

            if (! $invitation) {
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
                            'answer' => $answer['answer'],
                        ]);
                    }
                }
                DB::commit();

                return InvitationResource::make($invitation);
            } catch (\Exception $e) {
                DB::rollBack();

                return response()->json(['message' => 'An error occurred while updating the invitation: '.$e->getMessage()], 500);
            }
        }
    */

    public function update(StoreApologyRequest $request, $invitationId)
    {
        $user = auth()->user();
        $invitation = Invitation::find($invitationId);
        $message = Message::where('user_id', $user->id)->where('invitation_id', $invitation->id)
            ->where('type', MessageTypes::deleted)
            ->first();
        if ($message) {
            return response()->json(['message' => 'Invitation is Inactive']);
        }
        if (! $invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }
        $invitationId = $invitation->id;
        Message::create(array_merge(['user_id' => $user->id,
            'invitation_id' => $invitationId,
            'type' => MessageTypes::updated], $request->all()));
        $invitation->update([
            'status' => InvitationTypes::updated,
        ]);

        return response()->json(['message' => 'Updated Successfully']);
    }

    public function delete(StoreApologyRequest $request, $invitationId)
    {
        $invitation = Invitation::find($invitationId);
        if (! $invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }
        $user = auth()->user();
        $message = Message::where('user_id', $user->id)->where('invitation_id', $invitation->id)
            ->where('type', MessageTypes::deleted)
            ->first();
        if ($message) {
            return response()->json(['message' => 'Invitation is Inactive']);
        } else {
            try {
                DB::beginTransaction();
                $invitationId = $invitation->id;
                Message::create(array_merge(['user_id' => $user->id, 'invitation_id' => $invitationId,
                    'type' => MessageTypes::deleted], $request->all()));
                $invitation->update([
                    'status' => InvitationTypes::deleted,
                ]);
                DB::commit();

                return response()->json(['message' => 'Deleted Successfully']);
            } catch (\Exception $e) {
                DB::rollBack();

                return response(['message' => 'An error occurred while deleting the invitation and creating the apology message'.'  '.$e->getMessage()], 500);
            }
        }

    }
}
