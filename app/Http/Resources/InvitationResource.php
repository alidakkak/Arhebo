<?php

namespace App\Http\Resources;

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
            'sponsor_name' => $this->sponsor_name,
            'hijri_date' => $this->hijri_date,
            'miladi_date' => $this->miladi_date,
            'from' => $this->from,
            'to' => $this->to,
            'location_name' => $this->location_name,
            'location_link' => $this->location_link,
            'invitation_text' => $this->invitation_text,
            'prohibited_thing' => $this->prohibited_thing,
            'category' => CategoryResource::make($this->category),
            //'template' => TemplateResource::make($this->temolate),
            'package' => PackageResource::make($this->package),
            'user' => $this->user
        ];
    }
}
