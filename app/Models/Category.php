<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setImageAttribute ($image){
        $newImageName = uniqid() . '_' . 'categories_image' . '.' . $image->extension();
        $image->move(public_path('categories_image') , $newImageName);
        return $this->attributes['image'] =  '/'.'categories_image'.'/' . $newImageName;
    }


    public function template() {
        return $this->hasMany(Template::class);
    }
}
