<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInviteeRequest extends FormRequest
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
        if (request()->route()->uri() === 'api/updateInvitee') {
            return [
                'number_of_people' => 'required',
                'invitee_id' => ['required', Rule::exists('invitees', 'id')],
            ];
        }
        return [
            'status' => 'required_without_all:apology_message,accept_message|numeric',
            'uuid' => 'required|uuid',
            'apology_message' => 'required_without_all:status,accept_message|string',
            'accept_message' => 'required_without_all:status,apology_message|string',
        ];
    }
}
