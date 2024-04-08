<?php

namespace App\Http\Resources;

use App\Statuses\UserTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OffersResource extends JsonResource
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
            'image' => $request->user()->type === UserTypes::USER ? $this->image : asset($this->image),
        ];
    }
}
