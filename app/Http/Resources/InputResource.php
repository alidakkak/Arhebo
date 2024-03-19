<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InputResource extends JsonResource
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
            'input_name' => $this->input_name,
            'input_name_ar' => $this->input_name_ar,
            'placeholder' => $this->placeholder,
            'placeholder_ar' => $this->placeholder_ar,
            'validate' => ValidateResource::collection($this->validate),
        ];
    }
}
