<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReceptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'number_can_invite.required_if' => 'The number of invites is required when add extra inviter',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
            'number_can_invite' => [
                'required_if:type,2',
                'integer',
                'min:1',
            ],
        ];
    }
}
