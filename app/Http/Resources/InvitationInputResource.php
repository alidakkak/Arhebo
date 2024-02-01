<?php

namespace App\Http\Resources;

use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvitationInputResource extends JsonResource
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
            'input_name' => InputResource::collection(
                Input::whereHas('invitationInput', function ($query) {
                    $query->where('input_id', $this->id);
                })->get()
            ),
            'answer' => $this->answer,
        ];
    }
}
