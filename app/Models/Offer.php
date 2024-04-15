<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $newImageName = uniqid().'_'.'offers_image'.'.'.$image->extension();
            $image->move(public_path('offers_image'), $newImageName);
            $this->attributes['image'] = '/'.'offers_image'.'/'.$newImageName;
        } else if (is_string($image)) {
            $this->attributes['image'] = $image;
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($offer) {
            if ($offer->image) {
                $imagePath = public_path($offer->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

        });
        static::updated(function ($offer) {
            if ($offer->image) {
                if ($offer->isDirty('image')) {
                    $oldImagePath = public_path($offer->getOriginal('image'));
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
            }

        });
    }
}
