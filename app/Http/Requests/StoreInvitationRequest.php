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
            'category_id' => ['required', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'template_id' => ['required', Rule::exists('templates', 'id')->whereNull('deleted_at')],
            'package_id' => ['required', Rule::exists('packages', 'id')->whereNull('deleted_at')],
            'package_detail_id' => ['required', Rule::exists('package_details', 'id')->whereNull('deleted_at')],
            'prohibited.*.prohibited_thing_id' => ['required', Rule::exists('prohibited_things', 'id')],
            'hijri_date' => 'required|string',
            'miladi_date' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'event_name' => 'required|string',
            //            'city' => 'string',
            //            'region' => 'string',
            'location_link' => 'required|string',
            'inviter' => 'required|string',
            'invitation_text' => 'string',
            'is_with_qr' => 'required|boolean',
            'answers.*.answer' => 'required',
            'answers.*.input_id' => ['required', Rule::exists('inputs', 'id')],
        ];
    }
}
