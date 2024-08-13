<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
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
            'event_name' => $this->event_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'package' => $this->package->only('id', 'name', 'name_ar'),
            'packageDetail' => $this->packageDetail->only('id', 'price'),
            'additionalPackages' => AdditionalPackageResource::collection($this->additionalPackages),
            'extraFeatures' => $this->features->map(function ($feature) {
                return [
                    'id' => $feature->id,
                    'name' => $feature->name,
                    'name_ar' => $feature->name_ar,
                    'price' => $feature->price
                ];
            })
        ];
    }
}
