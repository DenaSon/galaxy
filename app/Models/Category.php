<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


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


}
