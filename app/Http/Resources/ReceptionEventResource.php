<?php

namespace App\Http\Resources;

use App\Models\Invitee;
use App\Models\QR;
use App\Statuses\InviteeTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceptionEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $invitation = $this->invitation;

        $attendees = QR::whereHas('invitee', function ($query) use ($invitation) {
            $query->where('invitation_id', $invitation->id);
        })->get();

        $totalAttendees = $attendees->sum('number_of_people_without_decrease');
        $totalRemaining = $attendees->sum('number_of_people');
        $totalPresent = $totalAttendees - $totalRemaining;

        $number_of_compensation = floor($invitation->number_of_compensation);
        $remaining = $invitation->number_of_invitees + $invitation->additional_package + $number_of_compensation;
        $remainingForAdditionalInvitee = $invitation->receptions->where('type', 2)->where('user_id', auth()->id())->first()->number_can_invite ?? 0;

        return [
            'id' => $this->id,
            'category' => $invitation->category->name,
            'event_name' => $invitation->event_name,
            'inviter' => $invitation->inviter,
            'hijri_date' => $invitation->hijri_date,
            'miladi_date' => $invitation->miladi_date,
            'from' => $invitation->from,
            'to' => $invitation->to,
            'location_name' => $invitation->location_name,
            'location_link' => $invitation->location_link,
            'is_with_qr' => $invitation->is_with_qr,
            'status' => $invitation->status,
            'city' => $invitation->city,
            'region' => $invitation->region,
            'template' => $invitation->template->image,
            'invited' => Invitee::where('invitation_id', $invitation->id)->sum('number_of_people'),
            'waiting' => Invitee::where('invitation_id', $invitation->id)->where('status', InviteeTypes::waiting)->sum('number_of_people'),
            'confirmed' => Invitee::where('invitation_id', $invitation->id)->where('status', InviteeTypes::confirmed)->sum('number_of_people'),
            'rejected' => Invitee::where('invitation_id', $invitation->id)->where('status', InviteeTypes::rejected)->sum('number_of_people'),
            'remaining' => $remaining,
            'remainingForAdditionalInvitee' => $remainingForAdditionalInvitee,
            'invitees' => Invitee::where('invitation_id', $invitation->id)->sum('number_of_people'),
            'attendees' => $totalPresent,
        ];
    }
}
