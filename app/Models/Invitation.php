<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function Template() {
        return $this->belongsTo(Template::class);
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function invitationInput() {
        return $this->hasMany(InvitationInput::class);
    }
}
