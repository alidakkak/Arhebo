<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvitationRequest extends FormRequest
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
            'category_id' => [Rule::exists('categories','id')],
            'template_id' => [ Rule::exists('templates','id')],
            'package_id' => [ Rule::exists('packages','id')],
            'package_detail_id' => [Rule::exists('package_details','id')],
            'hijri_date' => 'string',
            'miladi_date' => 'string',
            'from' => 'string',
            'to' => 'string',
//            'city' => 'string',
//            'region' => 'string',
            'event_name' => 'string',
            'location_link' => 'string',
            'location_name' => 'string',
            'inviter' => 'string',
            'invitation_text' => 'string',
            'prohibited_thing' => 'string',
            'is_with_qr' => 'boolean',
            'answers.*.answer' => 'string',
            'answers.*.input_id' => [Rule::exists('inputs', 'id')],
        ];
    }
}
