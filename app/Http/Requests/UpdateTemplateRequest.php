<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTemplateRequest extends FormRequest
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
            'title' => 'string',
            'title_ar' => 'string',
            'emoji' => 'string',
            'description' => 'string',
            'description_ar' => 'string',
            'template_code' => 'required|string',
            'category_id' => [Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'image' => 'image|mimes:jpeg,png,jpg,svg',
            'filter_id' => [
                Rule::exists('filters', 'id')->where(function ($query) {
                    return $query->where('category_id', $this->category_id);
                }),
            ],
        ];
    }
}
