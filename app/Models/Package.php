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

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_packages', 'package_id', 'coupon_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'package_features', 'package_id', 'feature_id');
    }

    public function attribute()
    {
        return $this->hasMany(Attribute::class);
    }
}
