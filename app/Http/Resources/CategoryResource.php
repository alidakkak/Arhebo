<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'image' => $this->image,
            'photo' => $this->photo,
            'description' => $this->descriptions,
            'category_code' => $this->category_code,
            'template' => TemplateResource::collection($this->Template),
            'input' => InputResource::collection($this->input)
        ];
    }
}
