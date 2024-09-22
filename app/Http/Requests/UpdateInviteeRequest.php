<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'status' => 'required_without_all:apology_message,accept_message|string',
            'uuid' => 'required|uuid',
            'apology_message' => 'required_without_all:status,accept_message|string',
            'accept_message' => 'required_without_all:status,apology_message|string',
        ];
    }
}
