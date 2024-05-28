<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InviteeResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'seat' => $this->seat,
            'number_of_people' => $this->number_of_people,
            'message' => $this->apology_message ?: $this->accept_message,
            'status' => $this->status,
            'template_photo' => $this->invitation->Template->image,
            'link' => $this->link,
            'uuid' => $this->uuid,
            'QRCode' => $this->qr,
        ];
    }
}
