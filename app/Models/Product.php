<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;



class Product extends Model
{


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->where('stop_selling',null);
    }


    public $guarded = [];
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');

    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute')->withPivot('value');

    }
}
