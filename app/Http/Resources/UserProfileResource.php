<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //            $countryCode = str_replace('+', '', $user->country_code);
        $countryCode = $this->country_code;

        $phoneWithoutCountryCode = preg_replace('/^'.preg_quote($countryCode, '/').'/', '', $this->phone);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'country_code' => $countryCode,
            'country_name' => $this->country_name,
            'phone' => $this->phone,
            'phoneWithoutCountryCode' => $phoneWithoutCountryCode,
            'email_verified_at' => $this->email_verified_at,
            'location' => $this->location,
            'image' => $this->image,
            'type' => $this->type,
            'code' => $this->code,
            'expired_at' => $this->expired_at,
            'is_verified' => $this->is_verified,
            'isActive' => $this->isActive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
