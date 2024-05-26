<?php

namespace App\Http\Resources;

use App\Models\Input;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\Message;
use App\Models\ProhibitedThing;
use App\Statuses\InviteeTypes;
use App\Statuses\MessageTypes;
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

        if ($request->route()->uri === 'api/showInvitationInfo/{invitee}') {
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
                'invitation_text' => $this->invitation->invitation_text,
                'is_with_qr' => $this->invitation->is_with_qr,
                'status' => $this->status,
                'city' => $this->invitation->city,
                'region' => $this->invitation->region,
                'QRCode' => $this->qr,
                'template' => asset($this->invitation->image),
            ];
        }

        $invitaionInput = $this->invitationInput->map(fn ($input) => [
            'name' => Input::where('id', $input->input_id)->first()->input_name,
            'name_ar' => Input::where('id', $input->input_id)->first()->input_name_ar,
            'value' => $input->answer,
        ]
        );

        $message = Message::where('invitation_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $invitation = Invitation::find($this->id);
        $number_of_compensation = floor($invitation->number_of_compensation);
        $remaining = $invitation->number_of_invitees + $invitation->additional_package;
        $additionalPackages = $this->additionalPackages->sum('number_of_invitees');

        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'inviter' => $this->inviter,
            'hijri_date' => $this->hijri_date,
            'miladi_date' => $this->miladi_date,
            'from' => $this->from,
            'to' => $this->to,
            'location_link' => $this->location_link,
            'is_with_qr' => $this->is_with_qr,
            'status' => $this->status,
            'city' => $this->city,
            'region' => $this->region,
            'message' => $message,
            'packageName' => $this->package->name,
            'packageDescription' => $this->package->description,
            'packageDescription_ar' => $this->package->description_ar,
            'maximumNumberCanInvitee' => $this->packageDetail->number_of_invitees + $additionalPackages,
            'discount' => $this->package->discount,
            'invited' => Invitee::where('invitation_id', $this->id)->sum('number_of_people'),
            'waiting' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::waiting)->sum('number_of_people'),
            'confirmed' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::confirmed)->sum('number_of_people'),
            'rejected' => Invitee::where('invitation_id', $this->id)->where('status', InviteeTypes::rejected)->sum('number_of_people'),
            'remaining' => $remaining,
            'compensation' => $number_of_compensation,
            'allInvited' => InviteeResource::collection(Invitee::where('invitation_id', $this->id)->get()) ,
            'prohibitedThings' => ProhibitedThingResource::collection(ProhibitedThing::whereHas('invitationProhibited', function ($query) {
                $query->where('invitation_id', $this->id);
            })->get()),
            'invitationInput' => $invitaionInput,
            'template' => asset($this->template->image),
            'extraFeature' => FeatureResource::collection($this->features),
            'additionalPackage' => AdditionalPackageResource::collection($this->additionalPackages),
        ];
    }
}
