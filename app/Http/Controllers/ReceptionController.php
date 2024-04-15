<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceptionRequest;
use App\Http\Resources\ReceptionEventResource;
use App\Http\Resources\ReceptionResource;
use App\Models\QR;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReceptionController extends Controller
{
    public function receptionList(Request $request)
    {
        $validatedData = $request->validate([
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
        ]);
        $receptionList = Reception::where('invitation_id', $validatedData['invitation_id'])->get();

        return ReceptionResource::collection($receptionList);
    }

    ///Reception Event
    public function myEvent()
    {
        $user = auth()->user();
        $reception = Reception::where('user_id', $user->id)->get();

        return ReceptionEventResource::collection($reception);
    }

    public function myEventById($Id)
    {
        $user = auth()->user();
        $reception = Reception::where('id', $Id)->where('user_id', $user->id)->first();
        if (! $reception) {
            return response()->json(['message' => 'Reception event not found or access denied.'], 404);
        }

        return ReceptionEventResource::make($reception);
    }

    public function store(StoreReceptionRequest $request)
    {
        $receptionData = $request->input('receptions', []);
        $receptions = [];
        foreach ($receptionData as $reception) {
            $isExist = Reception::where('user_id', $reception['user_id'])
                ->where('invitation_id', $reception['invitation_id'])
                ->exists();
            if ($isExist) {
                continue;
            }
            $newReception = Reception::create([
                'user_id' => $reception['user_id'],
                'invitation_id' => $reception['invitation_id'],
            ]);
            $receptions[] = $newReception;
        }

        return ReceptionResource::collection($receptions);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $phone = $request->input('phone').'%';
        $users = User::where('phone', 'LIKE', $phone)->with('invitation')->get();

        return $users;
    }

    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
        ]);

        $userId = $validatedData['user_id'];
        $invitationId = $validatedData['invitation_id'];
        $reception = Reception::where('user_id', $userId)->where('invitation_id', $invitationId)->first();

        if (! $reception) {
            return response()->json(['message' => 'Reception not found'], 404);
        }

        try {
            $reception->delete();

            return response()->json(['message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete the reception', 'error' => $e->getMessage()], 500);
        }
    }

    public function scanQRCodeForInvitee(Request $request)
    {
        $validatedData = $request->validate([
            'invitee_id' => ['required', Rule::exists('invitees', 'id')],
            'InviteeNumber' => 'required|numeric',
        ]);
        $qrCode = QR::where('invitee_id', $validatedData['invitee_id'])
            ->where('InviteeNumber', $validatedData['InviteeNumber'])
            ->first();
        if (! $qrCode) {
            return response()->json(['message' => 'Invalid QR Code'], 400);
        }

        if ($qrCode->status == 1) {
            return response()->json(['message' => 'QR Code has been scanned before'], 400);
        }
        $qrCode->update([
            'status' => 1,
        ]);

        return response()->json(['message' => 'QR Code scanned successfully']);
    }
}
