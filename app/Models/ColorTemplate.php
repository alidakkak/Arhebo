<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorTemplate extends Model
{
    use HasFactory;

    public function setImageAttribute ($image){
        $newImageName = uniqid() . '_' . 'templates_image' . '.' . $image->extension();
        $image->move(public_path('templates_image') , $newImageName);
        return $this->attributes['image'] =  '/'.'templates_image'.'/' . $newImageName;
    }
    protected $guarded = ['id'];

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
