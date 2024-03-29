<?php

namespace App\Http\Resources;

use App\Statuses\UserTypes;
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
            'name_ar' => $this->name_ar,
            'image' => $this->userType === UserTypes::USER ? $this->image : asset($this->image),
            'photo' => $this->userType === UserTypes::USER ? $this->photo : asset($this->photo),
            'description' => $this->description,
            'description_ar' => $this->description_ar,
            'category_code' => $this->category_code,
            'template' => TemplateResource::collection($this->Template),
        ];
    }
}
