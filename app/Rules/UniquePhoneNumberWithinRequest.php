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
        $uniqueNumbers = array_unique($numbers);
        if (count($numbers) !== count($uniqueNumbers)) {
            // Find the first duplicate number
            $this->duplicateNumber = $this->findFirstDuplicate($numbers);

            return false;
        }

        return true;
    }

    private function findFirstDuplicate($numbers)
    {
        $counted = array_count_values($numbers);
        foreach ($counted as $number => $count) {
            if ($count > 1) {
                return $number;
            }
        }

        return null; // No duplicates found (shouldn't happen in this context)
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number '.$this->duplicateNumber.' must be unique within the request.';
    }
}
