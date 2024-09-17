<?php

namespace App\Http\Resources;

use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\ProhibitedThing;
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
        if ($request->route()->uri === 'api/event') {
            return [
                'id' => $this->id,
                'category' => $this->invitation->category->name,
                'event_name' => $this->invitation->event_name,
                'inviter' => $this->invitation->inviter,
                'hijri_date' => $this->invitation->hijri_date,
                'miladi_date' => $this->invitation->miladi_date,
                'from' => $this->invitation->from,
                'to' => $this->invitation->to,
                'location_link' => $this->invitation->location_link,
                // 'invitation_text' => $this->invitation->invitation_text,
                'is_with_qr' => $this->invitation->is_with_qr,
                'status' => $this->status,
                'city' => $this->invitation->city,
                'region' => $this->invitation->region,
                'template' => $this->invitation->template->image,
            ];
        }
        $invitation = Invitation::find($this->id);
        $number_of_compensation = floor($invitation->number_of_compensation);
        $remaining = $invitation->number_of_invitees + $invitation->additional_package + $number_of_compensation;
        $isAdditionalInvitee = $invitation->receptions->where('type', 2)->where('user_id', auth()->id())->isNotEmpty();

        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'inviter' => $this->inviter,
            'hijri_date' => $this->hijri_date,
            'miladi_date' => $this->miladi_date,
            'from' => $this->from,
            'to' => $this->to,
            'location_link' => $this->location_link,
            'invitation_text' => $this->invitation_text,
            'is_with_qr' => $this->is_with_qr,
            'status' => $this->status,
            'city' => $this->city,
            'region' => $this->region,
            'isAdditionalInvitee' => $isAdditionalInvitee,
            'invited' => Invitee::where('invitation_id', $this->id)->sum('number_of_people'),
            'waiting' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::waiting)->sum('number_of_people'),
            'confirmed' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::confirmed)->sum('number_of_people'),
            'rejected' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::rejected)->sum('number_of_people'),
            'remaining' => $remaining,
            'compensation' => $number_of_compensation,
            'prohibitedThings' => ProhibitedThingResource::collection(ProhibitedThing::whereHas('invitationProhibited', function ($query) {
                $query->where('invitation_id', $this->id);
            })->get()),
            'invitationInput' => InvitationInputResource::collection($this->invitationInput),
            'InvitationFeature' => FeatureResource::collection($this->features),
            'template' => TemplateResource::make($this->template),
            'attribute' => AttributeResource::collection($this->package->attribute),
            //            'message' => $this->message
            'message' => '
'.$invitation->invitee()->first()->name.'،

نود تذكيركم بموعد '.$this->event_name.'
وذلك في '.$this->miladi_date.' في الساعة '.$this->from.'.

لأي استفسارات يمكنكم التواصل مع الداعي أو مع منصتنا للحصول على الدعم الفني.
',
        ];
    }
}
