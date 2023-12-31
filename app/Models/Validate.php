<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function input() {
        return $this->belongsTo(Input::class);
    }
}
