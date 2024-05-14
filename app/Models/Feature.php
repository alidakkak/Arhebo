<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_features', 'feature_id', 'package_id');
    }

    public function invitations()
    {
        return $this->belongsToMany(Invitation::class, 'invitation_features', 'feature_id', 'invitation_id')
            ->withPivot('value');
    }
}
