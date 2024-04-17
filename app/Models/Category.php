<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public static $isSeederRunning = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (! self::$isSeederRunning) {
                $latestCategory = static::withTrashed()->latest()->first();
                if ($latestCategory) {
                    $category->category_code = str_pad((int) $latestCategory->category_code + 1, 2, '0', STR_PAD_LEFT);
                } else {
                    $category->category_code = '01';
                }
            }
        });
    }

    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $newImageName = uniqid().'_'.'categories_image'.'.'.$image->extension();
            $image->move(public_path('categories_image'), $newImageName);
            $this->attributes['image'] = '/'.'categories_image'.'/'.$newImageName;
        } elseif (is_string($image)) {
            $this->attributes['image'] = $image;
        }
    }

    public function setPhotoAttribute($photo)
    {
        if ($photo instanceof \Illuminate\Http\UploadedFile) {
            $newImageName = uniqid().'_'.'categories_image'.'.'.$photo->extension();
            $photo->move(public_path('categories_image'), $newImageName);
            $this->attributes['image'] = '/'.'categories_image'.'/'.$newImageName;
        } elseif (is_string($photo)) {
            $this->attributes['photo'] = $photo;
        }
    }

    public function Template()
    {
        return $this->hasMany(Template::class);
    }

    public function input()
    {
        return $this->hasMany(Input::class);
    }

    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }

    public function filter()
    {
        return $this->hasMany(Filter::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_categories', 'category_id', 'coupon_id');
    }
}
