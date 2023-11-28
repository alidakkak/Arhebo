<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorTemplate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
