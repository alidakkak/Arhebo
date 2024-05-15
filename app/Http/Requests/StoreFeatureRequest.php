<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFeatureRequest extends FormRequest
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
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required',
            'quantity' => 'required|numeric',
            // 'description' => 'required|string',
            // 'description_ar' => 'required|string',
            'package_ids' => 'array|required',
            'package_ids.*' => ['required', Rule::exists('packages', 'id')],
        ];
    }
}
