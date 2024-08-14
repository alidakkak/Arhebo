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
        $totalWithTax = $calculateTax($subtotal);

        $totalSubtotal = array_sum(array_column($this, 'subtotal'));
        $totalWithTax = array_sum(array_column($this, 'total_with_tax'));

        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'package' => $this->package->only('id', 'name', 'name_ar'),
            'packageDetail' => [
                'id' => $this->packageDetail->id,
                'price' => round($packageDetailPrice, 2),
                'price_with_tax' => round($calculateTax($packageDetailPrice), 2),
            ],
            'additionalPackages' => $this->additionalPackages->map(function ($package) use ($calculateTax) {
                return [
                    'id' => $package->id,
                    'price' => round($package->price, 2),
                    'price_with_tax' => round($calculateTax($package->price), 2),
                ];
            }),
            'extraFeatures' => $this->features->map(function ($feature) use ($calculateTax) {
                return [
                    'id' => $feature->id,
                    'name' => $feature->name,
                    'name_ar' => $feature->name_ar,
                    'price' => round($feature->price, 2),
                    'price_with_tax' => round($calculateTax($feature->price), 2),
                ];
            }),
            'subtotal' => round($subtotal, 2),
            'total_with_tax' => round($totalWithTax, 2),
        ];
    }
}
