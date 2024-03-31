<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProhibitedThing;
use App\Models\Template;
use App\Models\Wishlist;
use App\Statuses\UserTypes;
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
        if ($request->route()->uri === 'api/template/{templateId}') {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'title_ar' => $this->title_ar,
                'description' => $this->description,
                'description_ar' => $this->description_ar,
                'emoji' => $this->emoji,
                'template_code' => $this->template_code,
                'category_id' => $this->category_id,
                'image' => $this->userType === UserTypes::USER ? $this->image : asset($this->image),
                'filters' => $this->filters->map(function ($filter) {
                    return [
                        'id' => $filter->id,
                        'name' => $filter->name,
                        'name_ar' => $filter->name_ar,
                    ];
                }),
                'category' => optional($this->category)->only(['id', 'name', 'name_ar']),
            ];
        }
        $userId = $request->user()->id;
        $templateId = $this->id;

        $isFavorite = Wishlist::where('user_id', $userId)
            ->where('template_id', $templateId)
            ->exists();
        $template = Template::with(['inputs' => function ($query) {
            $query->where('category_id', $this->category_id);
        }])->find($templateId);

        $prohibitedThing = ProhibitedThing::all();

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
            'title_ar' => $this->title_ar,
            'description' => $this->description,
            'description_ar' => $this->description_ar,
            'emoji' => $this->emoji,
            'template_code' => $this->template_code,
            'category_id' => $this->category_id,
            'image' => $this->userType === UserTypes::USER ? $this->image : asset($this->image),
            'is_favorite' => $isFavorite,
            'inputs' => InputResource::collection($template->inputs),
            'prohibitedThing' => ProhibitedThingResource::collection($prohibitedThing),
        ];
    }
}
