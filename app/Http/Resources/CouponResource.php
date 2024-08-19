<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'coupon_code' => $this->coupon_code,
            'offer' => $this->offer,
            'number' => $this->number,
            'expiry_date' => $this->expiry_date,
            'categories' => $this->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'name_ar' => $category->name_ar,
                ];
            }),
            'packages' => $this->packages->map(function ($package) {
                return [
                    'id' => $package->id,
                    'name' => $package->name,
                ];
            }),
        ];
    }
}
