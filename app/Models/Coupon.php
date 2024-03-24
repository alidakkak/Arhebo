<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'coupon_categories', 'category_id', 'coupon_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'coupon_packages', 'package_id', 'coupon_id');
    }
}
