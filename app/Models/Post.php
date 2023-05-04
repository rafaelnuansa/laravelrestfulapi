<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * comments
     *
     * @return void
     */
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    /**
     * tags
     *
     * @return void
     */
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    /**
     * image
     *
     * @return Attribute
     */

     // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => asset('/storage/posts/' . $value),
    //     );
    // }

    /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::locale('id')->parse($value)->translatedFormat('l, d F Y'),
        );
    }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::locale('id')->parse($value)->translatedFormat('l, d F Y'),
        );
    }
}
