<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $guarded = [];
    public function imageable()
    {
        return $this->morphTo();
    }


    protected static function booted()
    {
        static::saved(function ($product) {
            cache()->forget('slider-images-' . $product->id);
        });

        static::deleted(function ($product) {
            cache()->forget('slider-images-' . $product->id);
        });
    }

}
