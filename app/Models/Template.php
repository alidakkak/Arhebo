<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = ['title',"emoji","size","format","image","category_id"];

    public function setImageAttribute ($image){
        $newImageName = uniqid() . '_' . 'templates_image' . '.' . $image->extension();
        $image->move(public_path('templates_image') , $newImageName);
        return $this->attributes['image'] =  '/'.'templates_image'.'/' . $newImageName;
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function colorTemplate() {
        return $this->belongsToMany(Color::class,ColorTemplate::class)->withPivot("image","descriptions");

    }

}
