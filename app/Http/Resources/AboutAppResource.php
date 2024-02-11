<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutAppResource extends JsonResource
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
            'title_ar' => $this->title_ar,
            'body' => $this->body,
            'body_ar' => $this->body_ar,
            'phone' => $this->phone,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'whatsapp' => $this->whatsapp,
            'x' => $this->x,
        ];
    }
}
