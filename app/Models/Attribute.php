<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function invitations()
    {
        return $this->belongsToMany(Invitation::class, 'attribute_invitations', 'attribute_id', 'invitation_id')
            ->withPivot('value');
    }
}
