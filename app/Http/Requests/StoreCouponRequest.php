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
        return [
            'coupon_code' => 'required',
            'offer' => 'required|numeric|min:1|max:100',
            'categories.*.category_id' => ['required', Rule::exists('categories', 'id')],
            'packages.*.package_id' => ['required', Rule::exists('packages', 'id')],
        ];
    }
}
