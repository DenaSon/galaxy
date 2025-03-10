<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function scopeProductType(Builder $builder)
    {
        return $this->where('type', 'product');
    }

    public  function scopeBlogs(Builder $query)
    {
        return $query->where('type', 'blog');
    }

    public function scopeOnlyParent(Builder $query)
    {
        return $query->whereNull('parent_id');

    }


    protected $fillable = ['name', 'description','parent_id','type'];

    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'categorizable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }



    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('layout-categories');
        });

        static::deleted(function () {
            cache()->forget('layout-categories');
        });
    }


}
