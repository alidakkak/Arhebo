<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->route()->uri() === 'api/checkCoupon') {
            return [
                'coupon_code' => 'string|required',
                'category_id' => ['required', 'numeric', Rule::exists('categories', 'id')->whereNull('deleted_at')],
                'package_id' => ['required', 'numeric', Rule::exists('packages', 'id')->whereNull('deleted_at')],
            ];
        }

        return [
            'coupon_code' => 'string|required|unique:coupons,coupon_code',
            'offer' => 'required|numeric|min:1|max:100',
            'number' => 'required|numeric|min:1',
            'expiry_date' => 'required|date',
            'categories' => 'required|array',
            'categories.*' => ['required', 'numeric', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'packages' => 'required|array',
            'packages.*' => ['required', 'numeric', Rule::exists('packages', 'id')->whereNull('deleted_at')],
        ];
    }
}
