<?php

namespace App\Http\Resources;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userId = auth()->user()->id;
        $templateId = $this->template->id;

        $isFavorite = Wishlist::where('user_id', $userId)
            ->where('template_id', $templateId)
            ->exists();
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'template' => array_merge($this->template->toArray(), ['is_favorite' => $isFavorite])
        ];
    }
}
