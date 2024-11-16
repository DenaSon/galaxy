<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    public $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    //Handle Cache
    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('home_blogs');
        });

        static::deleted(function () {
            cache()->forget('home_blogs');
        });
    }




}
