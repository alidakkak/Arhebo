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
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'number_can_invite.required_if' => 'The number of invites is required when add extra inviter',
            'type.in' => 'The selected type is invalid. It must be either 1 or 2.',
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
            'type' => 'required',
            'number_can_invite' => [
                'required_if:type,2',
                'integer',
                'min:1',
            ],
            'phone' => [
                'required',
                'max:20',
                //                                Rule::unique('receptions')->where(function ($query) {
                //                                    return $query->where('type', $this->type);
                //                                }),
            ],
        ];
    }
}
