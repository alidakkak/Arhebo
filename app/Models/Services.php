<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Services extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $newImageName = uniqid().'_'.'services_image'.'.'.$image->extension();
            $image->move(public_path('services_image'), $newImageName);

            return $this->attributes['image'] = '/'.'services_image'.'/'.$newImageName;
        } elseif (is_string($image)){
            $this->attributes['image'] = $image;
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($service) {
            if ($service->image) {
                $imagePath = public_path($service->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

        });
        static::updated(function ($service) {
            if ($service->image) {
                if ($service->isDirty('image')) {
                    $oldImagePath = public_path($service->getOriginal('image'));
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
            }

        });
    }
}
