<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterTemplate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
