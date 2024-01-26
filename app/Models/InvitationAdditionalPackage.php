<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationAdditionalPackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function additionalPackage()
    {
        return $this->belongsTo(AdditionalPackage::class);
    }

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}
