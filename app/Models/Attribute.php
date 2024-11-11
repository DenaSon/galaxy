<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    public $timestamps =false;

    protected $guarded = [];
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_attribute')->withPivot('value');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($attribute) {

            $attribute->products()->detach();
        });
    }





}
