<?php

namespace App\Http\Resources;

use App\Models\Color;
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
        $colors_details = array();
     foreach ($this->colorTemplate as $index=>$color)
     {
         $colors_details[$index]["description"]=$color->pivot->descriptions;
         $colors_details[$index]["image"]=$color->pivot->image;
         $colors_details[$index]["color"]=$color->color;
     }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            "size"=>$this->size,
            "format" => $this->format,
            'colors' => $colors_details,
        ];
    }
}
