<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function inputs()
    {
        return $this->hasMany(Input::class, 'category_id', 'category_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($template) {
            $lastTemplate = static::withTrashed()->latest()->first();
            if ($lastTemplate) {
                $template->template_code =
                    str_pad((int) $lastTemplate->template_code + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $template->template_code = '0001';
            }
        });
    }

    public function setImageAttribute($image)
    {
        $newImageName = uniqid().'_'.'categories_image'.'.'.$image->extension();
        $image->move(public_path('categories_image'), $newImageName);

        return $this->attributes['image'] = '/'.'categories_image'.'/'.$newImageName;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //    public function colorTemplate() {
    //        return $this->belongsToMany(Color::class,ColorTemplate::class)->withPivot("template","descriptions");
    //    }

    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'filter_templates', 'template_id', 'filter_id');
    }
}
