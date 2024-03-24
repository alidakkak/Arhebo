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
            'coupon_status' => $this->coupon_status,
            'number_of_used' => $this->number_of_used,
            'category' => $this->categories,
            'package' => $this->packages,
        ];
    }
}
