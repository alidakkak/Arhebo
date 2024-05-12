<?php

namespace App\Http\Resources;

use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\Package;
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
        $rejected = Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::rejected)->count();
        /// An alternative for people who rejected the invitation
        $replaced = Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::Replaced)->count();
        $invitation = Invitation::find($this->id);
        $packageId = $invitation->package_id;
        $package = Package::find($packageId);
        $discount = $package->discount;
        $compensation = max(0, ($rejected - $replaced) * ($discount / 100));
        $compensation = floor($compensation);

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
            'invited' => Invitee::where('invitation_id', $this->id)->count(),
            'waiting' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::waiting)->count() + $replaced,
            'confirmed' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::confirmed)->count(),
            'rejected' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::rejected)->count(),
            'compensation' => $compensation,
            'replaced' => $replaced,
            'prohibitedThings' => ProhibitedThingResource::collection(ProhibitedThing::whereHas('invitationProhibited', function ($query) {
                $query->where('invitation_id', $this->id);
            })->get()),
            'invitationInput' => InvitationInputResource::collection($this->invitationInput),
            'InvitationFeature' => FeatureResource::collection($this->features),
            'template' => TemplateResource::make($this->template),
            //            'message' => $this->message
        ];
    }
}
