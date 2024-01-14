<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInviteeRequest;
use App\Http\Requests\UpdateInviteeRequest;
use App\Http\Resources\InviteeResource;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Statuses\InviteeTypes;
use App\Statuses\UserTypes;
use Illuminate\Http\Request;

class InviteeController extends Controller
{
    public function index(Request $request) {
        if($request->status == InviteeTypes::invited) {
            $invitee = Invitee::where('invitation_id', $request->invitation_id)->get();
            return InviteeResource::collection($invitee);
        } else {
            $invitee = Invitee::where('status' , $request->status)
                ->where('invitation_id', $request->invitation_id)
                ->get();
            return InviteeResource::collection($invitee);
        }
    }

    public function store(StoreInviteeRequest $request) {
        ////  The total number of people invited to the invitation
        $number_of_people = invitee::where('invitation_id', $request->invitation_id)->sum('number_of_people');
        ////  The number of people in package detail
        $package_detail = Invitation::find($request->invitation_id)->packageDetail()->select('number_of_invitees')->first();
        $package_detail_number = $package_detail->number_of_invitees;
        $inviteesData = $request->input('invitees', []);
        $invitees = [];
        foreach ($inviteesData as $invitee) {
            if ($number_of_people + $invitee['number_of_people'] > $package_detail_number) {
                return response()->json(['message' => 'You have reached the maximum number of invitees' .
                    ', The number of invitees you have added ' . $number_of_people
                ]);
            }
                $newInvitee = Invitee::create([
                    'name' => $invitee['name'],
                    'phone' => $invitee['phone'],
                    'number_of_people' => $invitee['number_of_people'],
                    'invitation_id' => $request->input('invitation_id'),
                ]);
                $invitees[] = $newInvitee;
            $number_of_people += $invitee['number_of_people'];
            }
        return InviteeResource::collection($invitees);
    }




    /// API For conformed Or Rejected Invitation
    public function update(UpdateInviteeRequest $request, Invitee $invitee) {
        $status = $request->status;
        if ($status == InviteeTypes::rejected) {
            $this->validate($request, [
                'apology_message' => 'required'
            ]);
            $invitee->update([
                'status' => $status,
                'apology_message' => $request->apology_message
            ]);
        } else {
            $invitee->update([
                'status' => $status
            ]);
        }
        return InviteeResource::make($invitee);
    }

}
