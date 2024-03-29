<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function validate()
    {
        return $this->hasMany(Validate::class);
    }

    public function invitationInput()
    {
        return $this->hasMany(InvitationInput::class);
    }
}
