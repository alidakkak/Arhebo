<?php

namespace App\Http\Resources;

use App\Models\Invitee;
use App\Models\QR;
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
        $invitationId = $this->invitation->id;

        $attendees = QR::whereHas('invitee', function ($query) use ($invitationId) {
            $query->where('invitation_id', $invitationId);
        })->where('status', 1)->count();

        return [
            'id' => $this->id,
            'category' => $this->invitation->category->name,
            'event_name' => $this->invitation->event_name,
            'inviter' => $this->invitation->inviter,
            'hijri_date' => $this->invitation->hijri_date,
            'miladi_date' => $this->invitation->miladi_date,
            'from' => $this->invitation->from,
            'to' => $this->invitation->to,
            'location_name' => $this->invitation->location_name,
            'location_link' => $this->invitation->location_link,
            'invitation_text' => $this->invitation->invitation_text,
            'is_with_qr' => $this->invitation->is_with_qr,
            'status' => $this->status,
            'city' => $this->invitation->city,
            'region' => $this->invitation->region,
            'template' => $this->invitation->template->image,
            'invitees' => Invitee::where('invitation_id', $this->invitation->id)->sum('number_of_people'),
            'attendees' => $attendees,
        ];
    }
}
