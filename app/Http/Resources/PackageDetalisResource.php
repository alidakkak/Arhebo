<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageDetalisResource extends JsonResource
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
            'price' => $this->price,
            //   'price_qr' => $this->price_qr,
            'number_of_invitees' => $this->number_of_invitees,
            'price_reminder_per_person' => $this->price_reminder_per_person,
        ];
    }
}
