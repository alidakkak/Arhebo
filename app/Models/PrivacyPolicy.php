<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setImageAttribute($image)
    {
        $newImageName = uniqid() . '_' . 'services_image' . '.' . $image->extension();
        $image->move(public_path('services_image'), $newImageName);
        return $this->attributes['image'] = '/' . 'services_image' . '/' . $newImageName;
    }
}
