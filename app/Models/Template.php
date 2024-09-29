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

    public function scopeFilter(array $filters , $query){
        $query->when($filters['filter'] ?? false , fn($query , $filter) =>
            $query->whereHas('template_filters' , fn($query) =>
                $query->where('id' , $filter)
            )
        );
    }

    public static $isSeederRunning = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($template) {
            if (! self::$isSeederRunning) {
                $lastTemplate = static::withTrashed()->latest('id')->first();
                if ($lastTemplate) {
                    $template->template_code =
                        str_pad((int) $lastTemplate->template_code + 1, 5, '0', STR_PAD_LEFT);
                } else {
                    $template->template_code = '00001';
                }
            }
        });
    }

    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $newImageName = uniqid().'_'.'templates_image'.'.'.$image->extension();
            $image->move(public_path('templates_image'), $newImageName);

            return $this->attributes['image'] = '/'.'templates_image'.'/'.$newImageName;
        } elseif (is_string($image)) {
            $this->attributes['image'] = $image;
        }
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

    public function template_filters(){
        return $this->hasMany(FilterTemplate::class);
    }
}
