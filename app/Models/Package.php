<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function packageDetail()
    {
        return $this->hasMany(PackageDetail::class);
    }

    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }
}
