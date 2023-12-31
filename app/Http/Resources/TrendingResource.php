<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrendingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        $colors_details = array();
//        foreach ($this->colorTemplate as $index=>$color)
//        {
//            $colors_details[$index]["description"]=$color->pivot->descriptions;
//            $colors_details[$index]["template"]=$color->pivot->template;
//            $colors_details[$index]["color"]=$color->color;
//        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'emoji' => $this->emoji,
            'category_id' => $this->category_id,
            "size"=>$this->size,
            "format" => $this->format,
            'image' => $this->image,
            //'invitation_count' => $this->invitation_count
        ];
    }
}
