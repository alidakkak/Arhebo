<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvitationRequest extends FormRequest
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
            // General invitation information
            'category_id' => ['required', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'filter_id' => ['nullable', Rule::exists('filters', 'id')],
            'template_id' => ['nullable', Rule::exists('templates', 'id')->whereNull('deleted_at')],
            'package_id' => ['required', Rule::exists('packages', 'id')->whereNull('deleted_at')],
            'package_detail_id' => ['required', Rule::exists('package_details', 'id')->whereNull('deleted_at')],

            // Event details
            'hijri_date' => 'required|string',
            'miladi_date' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'event_name' => 'required|string',
            'location_link' => 'required|string',
            'location_name' => 'nullable|string',
            'inviter' => 'required|string',

            // Prohibited items
            'prohibited' => 'array',
            'prohibited.*.prohibited_thing_id' => ['nullable', Rule::exists('prohibited_things', 'id')],

            // Invitation answers
            'answers' => 'array',
            'answers.*.answer' => 'nullable|string',
            'answers.*.input_id' => ['required', Rule::exists('inputs', 'id')],

            // Features and attributes
            'features' => 'array',
            'features.*.value' => 'nullable|string',
            'features.*.quantity' => 'nullable|integer',
            'features.*.feature_id' => ['nullable', Rule::exists('features', 'id')],

            'attributes' => 'array',
            'attributes.*.attribute_id' => ['nullable', Rule::exists('attributes', 'id')],
            'attributes.*.value' => 'nullable|string',
        ];
    }
}
