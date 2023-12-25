<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setImageAttribute ($image){
        $newPhotoName = uniqid() . '_' . 'offers_image' . '.' . $image->extension();
        $image->move(public_path('offers_image') , $newPhotoName);
        return $this->attributes['image'] =  '/'.'offers_image'.'/' . $newPhotoName;
    }
}
