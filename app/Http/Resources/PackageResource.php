<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'description' => $this->description,
            'description_ar' => $this->description_ar,
            'color' => $this->color,
            'discount' => $this->discount,
            'attribute' => AttributeResource::collection($this->attribute),
            'packageDetails' => $this->packageDetail,
            'extraFeature' => FeatureResource::collection($this->features),
        ];
    }
}
