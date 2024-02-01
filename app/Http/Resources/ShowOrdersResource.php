<?php

namespace App\Http\Resources;

use App\Models\Input;
use App\Models\ProhibitedThing;
use App\Statuses\InvitationTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        if ($request->route()->uri === "api/showInvitationInfo/{invitee}"){
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
                'status' => $this->invitation->status ?? InvitationTypes::active,
                'city' => $this->invitation->city,
                'region' => $this->invitation->region,
                'template' => asset($this->invitation->template->image),
            ];
        }

        $invitaionInput = $this->invitationInput->map(fn ($input) => [
            'name' => Input::where('id', $input->input_id)->first()->input_name,
            'value' => $input->answer,
        ]
        );

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
            'prohibitedThings' => ProhibitedThingResource::collection(ProhibitedThing::whereHas('invitationProhibited', function ($query) {
                $query->where('invitation_id', $this->id);
            })->get()),
            'invitationInput' => $invitaionInput,
            'template' => asset($this->template->image),
        ];
    }
}
