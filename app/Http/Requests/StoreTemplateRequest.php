<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTemplateRequest extends FormRequest
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
            'title' => 'required|string',
            'emoji' => 'required|string',
            "descriptions"=>"required|string",
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
//            'colors' => 'required|array',
//            'colors.*.description' => 'required|string',
//            'colors.*.template' => 'required|image|mimes:jpeg,png,jpg,svg',
//            'colors.*.name' => 'required|string',

        ];
    }
}
