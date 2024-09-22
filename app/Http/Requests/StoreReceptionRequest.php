<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReceptionRequest extends FormRequest
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
            //            'receptions.*.user_id' => ['required', Rule::exists('users', 'id')],
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
            'type' => 'required',
            'phone' => 'required',
        ];
    }
}
