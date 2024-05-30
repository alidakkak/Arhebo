<?php

namespace App\Http\Requests;

use App\Rules\UniquePhoneNumberWithinRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreInviteeRequest extends FormRequest
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
        if (\request()->route()->uri === 'api/addInvitees') {
            return [
                'invitation_id' => ['required', Rule::exists('invitations', 'id')],
                'invitees.*.name' => 'required|array',
                'invitees.*.number' => [
                    'required',
                    'array',
                    new UniquePhoneNumberWithinRequest(request()->input('invitees'), 'number'),
                    Rule::unique('invitees', 'phone')->where(function ($query) {
                        return $query->where('invitation_id', request()->invitation_id);
                    }),
                ],
                'invitees.*.count' => 'required|integer|min:1',
            ];
        }

        return [
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
            'invitees.*.name' => 'required',
            'invitees.*.number' => [
                'required',
                new UniquePhoneNumberWithinRequest(request()->input('invitees'), 'number'),
                Rule::unique('invitees', 'phone')->where(function ($query) {
                    return $query->where('invitation_id', request()->invitation_id);
                }),
            ],
            'invitees.*.count' => 'required|integer|min:1',
        ];
    }
}
