<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }

    public function templates()
    {
        return $this->belongsToMany(Template::class, 'filter_templates', 'filter_id', 'template_id');
    }
}
