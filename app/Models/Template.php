<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($template) {
            $lastTemplate = static::latest()->first();
            if($lastTemplate) {
                $template->template_code =
                    str_pad((int)$lastTemplate->template_code + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $template->template_code = '0001';
            }
        });
    }


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
