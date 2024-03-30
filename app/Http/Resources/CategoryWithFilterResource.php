<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryWithFilterResource extends JsonResource
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
            'filters' => $this->filter->map(function ($filter) {
                return [
                    'id' => $filter->id,
                    'name' => $filter->name,
                    'name_ar' => $filter->name_ar,
                ];
            }),
        ];
    }
}
