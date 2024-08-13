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
        $calculateTax = function ($price) {
            return $price * 1.15;
        };

        $packageDetailPrice = $this->packageDetail->price;
        $additionalPackagesTotal = $this->additionalPackages->sum('price');
        $extraFeaturesTotal = $this->features->sum('price');

        $subtotal = $packageDetailPrice + $additionalPackagesTotal + $extraFeaturesTotal;
        $total = $calculateTax($subtotal);

        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'package' => $this->package->only('id', 'name', 'name_ar'),
            'packageDetail' => [
                'id' => $this->packageDetail->id,
                'price' => $packageDetailPrice,
                'price_with_tax' => $calculateTax($packageDetailPrice),
            ],
            'additionalPackages' => $this->additionalPackages->map(function ($package) use ($calculateTax) {
                return [
                    'id' => $package->id,
                    'price' => $package->price,
                    'price_with_tax' => $calculateTax($package->price),
                ];
            }),
            'extraFeatures' => $this->features->map(function ($feature) use ($calculateTax) {
                return [
                    'id' => $feature->id,
                    'name' => $feature->name,
                    'name_ar' => $feature->name_ar,
                    'price' => $feature->price,
                    'price_with_tax' => $calculateTax($feature->price),
                ];
            }),
            'subtotal' => $subtotal,
            'total_with_tax' => $total,
        ];
    }
}
