<?php

namespace App\Http\Resources;

use App\Models\Invitee;
use App\Models\ProhibitedThing;
use App\Statuses\InvitationTypes;
use App\Statuses\InviteeTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvitationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'inviter' => $this->inviter,
            'hijri_date' => $this->hijri_date,
            'miladi_date' => $this->miladi_date,
            'from' => $this->from,
            'to' => $this->to,
            'location_name' => $this->location_name,
            'location_link' => $this->location_link,
            'invitation_text' => $this->invitation_text,
            'is_with_qr' => $this->is_with_qr,
            'status' => $this->status ?? InvitationTypes::active,
            'city' => $this->city,
            'region' => $this->region,
            'invited' => Invitee::where('invitation_id', $this->id)->count(),
            'waiting' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::waiting)->count(),
            'confirmed' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::confirmed)->count(),
            'rejected' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::rejected)->count(),
            'prohibitedThings' => ProhibitedThingResource::collection(ProhibitedThing::whereHas('invitationProhibited', function ($query) {
                $query->where('invitation_id', $this->id);
            })->get()),
            'invitationInput' => InvitationInputResource::collection($this->invitationInput),
            'template' => TemplateResource::make($this->template),
            //            'message' => $this->message
        ];
    }
}
