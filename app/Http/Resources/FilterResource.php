<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $templates = $this->templates()->paginate(10);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'category_id' => $this->category_id,
            'template' => TemplateResource::collection($templates),
            'pagination' => [
                'total' => $templates->total(),
                'per_page' => $templates->perPage(),
                'current_page' => $templates->currentPage(),
                'last_page' => $templates->lastPage(),
                'next_page_url' => $templates->nextPageUrl(),
                'prev_page_url' => $templates->previousPageUrl(),
                'first_page_url' => $templates->url(1),
                'last_page_url' => $templates->url($templates->lastPage()),
            ],
        ];
    }
}
