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
            'category_id' => ['required', Rule::exists('categories','id')],
            'template_id' => ['required', Rule::exists('templates','id')],
            'package_id' => ['required', Rule::exists('packages','id')],
            'hijri_date' => 'required|string',
            'miladi_date' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'event_name' => 'required|string',
            'location_link' => 'required|string',
            'location_name' => 'required|string',
            'sponsor_name' => 'required|string',
            'invitation_text' => 'required|string',
            'prohibited_thing' => 'required|string',
            'answers.*' => 'required',
            'input_id.*' => ['required', Rule::exists('inputs', 'id')],
        ];
    }
}
