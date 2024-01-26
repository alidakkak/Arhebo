<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function invitationAdditionalPackage()
    {
        return $this->hasMany(InvitationAdditionalPackage::class);
    }
}
