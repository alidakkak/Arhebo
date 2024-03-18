<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $latestCategory = static::withTrashed()->latest()->first();
            if ($latestCategory) {
                $category->category_code =
                    str_pad((int) $latestCategory->category_code + 1, 2, '0', STR_PAD_LEFT);
            } else {
                $category->category_code = '01';
            }
        });
    }

    public function setImageAttribute($image)
    {
        $newImageName = uniqid().'_'.'categories_image'.'.'.$image->extension();
        $image->move(public_path('categories_image'), $newImageName);

        return $this->attributes['image'] = '/'.'categories_image'.'/'.$newImageName;
    }

    public function setPhotoAttribute($photo)
    {
        $newPhotoName = uniqid().'_'.'categories_image'.'.'.$photo->extension();
        $photo->move(public_path('categories_image'), $newPhotoName);

        return $this->attributes['photo'] = '/'.'categories_image'.'/'.$newPhotoName;
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

    public function filter() {
        return $this->hasMany(Filter::class);
    }
}
