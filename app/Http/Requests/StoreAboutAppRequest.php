<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutAppRequest extends FormRequest
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
            'title_ar' => 'required|string',
            'body' => 'required|string',
            'body_ar' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'whatsapp' => 'required|string',
            'x' => 'required|string',
        ];
    }
}
