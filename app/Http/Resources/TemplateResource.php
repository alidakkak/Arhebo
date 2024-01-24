<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\Template;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TemplateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userId = auth()->user()->id;
        $templateId = $this->id;

        $isFavorite = Wishlist::where('user_id', $userId)
            ->where('template_id', $templateId)
            ->exists();
        $template = Template::with(['inputs' => function ($query) {
            $query->where('category_id', $this->category_id);
        }])->find($templateId);

        //        $colors_details = array();
        //     foreach ($this->colorTemplate as $index=>$color)
        //     {
        //         $colors_details[$index]["description"]=$color->pivot->descriptions;
        //         $colors_details[$index]["template"]=$color->pivot->template;
        //         $colors_details[$index]["color"]=$color->color;
        //     }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->descriptions,
            'emoji' => $this->emoji,
            'template_code' => $this->template_code,
            'category_id' => $this->category_id,
            'size' => $this->size,
            'format' => $this->format,
            'image' => $this->image,
            'is_favorite' => $isFavorite,
            'inputs' => InputResource::collection($template->inputs),
        ];
    }
}
