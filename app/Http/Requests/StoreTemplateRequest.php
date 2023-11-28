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
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
//            "description"=>"required|string",
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'colors' => 'required|array',
            'colors.*.description' => 'required|string',
            'colors.*.image' => 'required|image|mimes:jpeg,png,jpg,svg',
            'colors.*.name' => 'required|string',



        ];
    }
}
