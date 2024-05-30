<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CustomUniquePhoneNumber implements Rule
{
    private $table;
    private $column;
    private $exceptId;
    private $duplicateNumber = null;

    public function __construct($table, $column, $exceptId = null)
    {
        $this->table = $table;
        $this->column = $column;
        $this->exceptId = $exceptId;
    }

    public function passes($attribute, $value)
    {
        $query = DB::table($this->table)
            ->where($this->column, $value);

        if ($this->exceptId) {
            $query->where('id', '!=', $this->exceptId);
        }

        $exists = $query->first();

        if ($exists) {
            $this->duplicateNumber = $value;
            return false;
        }

        return true;
    }

    public function message()
    {
        return "The phone number {$this->duplicateNumber} has already been taken.";
    }
}
