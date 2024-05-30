<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CustomUniquePhoneNumber implements Rule
{
    private $table;
    private $column;
    private $invitationId;
    private $duplicateNumber = null;

    public function __construct($table, $column, $invitationId = null)
    {
        $this->table = $table;
        $this->column = $column;
        $this->invitationId = $invitationId;
    }

    public function passes($attribute, $value)
    {
        $query = DB::table($this->table)
            ->where($this->column, $value)
            ->where('invitation_id', $this->invitationId);

        $exists = $query->exists();

        if ($exists) {
            $this->duplicateNumber = $value;
            return false;
        }

        return true;
    }

    public function message()
    {
        return "The phone number {$this->duplicateNumber} is already used for this invitation.";
    }
}
