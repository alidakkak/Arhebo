<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAskedQuestion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setImageAttribute ($image){
        $newImageName = uniqid() . '_' . 'FAQ_image' . '.' . $image->extension();
        $image->move(public_path('FAQ_image') , $newImageName);
        return $this->attributes['image'] =  '/'.'FAQ_image'.'/' . $newImageName;
    }
}
