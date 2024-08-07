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
        $templates = $this->Template()->paginate(10);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'image' => $request->user()->type === UserTypes::USER ? $this->image : asset($this->image),
            'photo' => $request->user()->type === UserTypes::USER ? $this->photo : asset($this->photo),
            'description' => $this->description,
            'description_ar' => $this->description_ar,
            'category_code' => $this->category_code,
            'message' => $this->message,
            'message_ar' => $this->message_ar,
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
