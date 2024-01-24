<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProhibitedThing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function InvitationProhibited()
    {
        return $this->hasMany(InvitationProhibited::class);
    }
}
