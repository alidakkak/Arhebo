<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorTemplate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //    public function setTemplateAttribute ($template){
    //        $newTemplateName = uniqid() . '_' . 'templates_image' . '.' . $template->extension();
    //        $template->move(public_path('templates_image') , $newTemplateName);
    //        return $this->attributes['template'] =  '/'.'templates_image'.'/' . $newTemplateName;
    //    }
    //
    //    public function color() {
    //        return $this->belongsTo(Color::class);
    //    }
    //
    //    public function Template() {
    //        return $this->belongsTo(Template::class);
    //    }
}
