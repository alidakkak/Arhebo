<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

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
