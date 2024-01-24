<?php

namespace App\Http\Resources;

use App\Models\Template;
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
        $template = $this->template;

        if ($template) {
            $templateId = $template->id;

            $isFavorite = Wishlist::where('user_id', $userId)
                ->where('template_id', $templateId)
                ->exists();

            $templateWithInputs = Template::with(['inputs' => function ($query) use ($template) {
                $query->where('category_id', $template->category_id);
            }])->find($templateId);

            return [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'template' => array_merge($template->toArray(), ['is_favorite' => $isFavorite],
                    ['inputs' => InputResource::collection($templateWithInputs->inputs)]),
            ];
        } else {
            return [];
        }
    }
}
