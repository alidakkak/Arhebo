<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class UniquePhoneNumberWithinRequest implements Rule
{
    private $data;

    private $attribute;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data, $attribute)
    {
        $this->data = $data;
        $this->attribute = $attribute;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $numbers = Arr::pluck($this->data, $this->attribute);

        return count($numbers) === count(array_unique($numbers));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Each phone number must be unique within the request.';
    }
}
