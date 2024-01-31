<?php

namespace App\Http\Resources;

use App\Statuses\InviteeTypes;
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
            'apology_message' => $this->apology_message,
            'status' => $this->status ?? InviteeTypes::waiting,
            'QRCode' => $this->qr,
            'link' => $this->link
        ];
    }
}
