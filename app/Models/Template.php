<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function setTemplateAttribute ($template){
        $newTemplateName = uniqid() . '_' . 'templates_image' . '.' . $template->extension();
        $template->move(public_path('templates_image') , $newTemplateName);
        return $this->attributes['template'] =  '/'.'templates_image'.'/' . $newTemplateName;
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function colorTemplate() {
        return $this->belongsToMany(Color::class,ColorTemplate::class)->withPivot("template","descriptions");
    }

    public function invitation() {
        return $this->hasMany(Invitation::class);
    }

}
