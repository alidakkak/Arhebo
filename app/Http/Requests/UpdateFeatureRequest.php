<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFeatureRequest extends FormRequest
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
            'name' => 'string',
            'name_ar' => 'string',
            'price' => 'numeric',
            //            'type' => 'required',
            'quantity' => 'numeric',
            // 'description' => 'required|string',
            // 'description_ar' => 'required|string',
            'package_ids' => 'array',
            'package_ids.*' => [Rule::exists('packages', 'id')],
        ];
    }
}
