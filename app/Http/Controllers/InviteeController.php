<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInviteeRequest;
use App\Http\Requests\UpdateInviteeRequest;
use App\Http\Resources\InviteeResource;
use App\Models\Invitee;
use Illuminate\Http\Request;

class InviteeController extends Controller
{
    public function index(Request $request) {
        $uesr = auth()->user();
        $invitee = Invitee::where('status' , $request->status)
            ->where('invitation_id', $request->invitation_id)
            ->get();
        return InviteeResource::collection($invitee);
    }

    public function store(StoreInviteeRequest $request) {
        $invitee = Invitee::create($request->all());
        return InviteeResource::make($invitee);
    }

    /// API For conformed Or Rejected Invitation
    public function update(UpdateInviteeRequest $request,Invitee $invitee) {
       $invitee->update([
           'status' => $request->status
        ]);
        return InviteeResource::make($invitee);
    }
}
