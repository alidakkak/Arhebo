<?php

namespace App\Http\Resources;

use App\Statuses\InviteeTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
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
            'title' => $this->title,
            'user' => $this->user,
            'invitation' => $this->invitation,
            'inviteeWaiting' => $this->invitation->invitee->filter(function ($invitee) {
                return $invitee->status == InviteeTypes::waiting;
            }),
        ];
    }
}
