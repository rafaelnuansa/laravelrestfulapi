<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => asset('/storage/sliders/' . $value),
    //     );
    // }
}
