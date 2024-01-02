<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationInput extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function input() {
        return $this->belongsTo(Input::class);
    }

    public function invitation() {
        return $this->belongsTo(Invitation::class);
    }
}
