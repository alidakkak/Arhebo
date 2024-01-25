<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvitationSupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'clint' => $this->user->name,
            'package' => $this->package->name,
            'number' => $this->packageDetail->number_of_invitees,
            'qrcode' => $this->is_with_qr,
            'status' => $this->status,
            'action' => $this->user->phone,
        ];
    }
}
