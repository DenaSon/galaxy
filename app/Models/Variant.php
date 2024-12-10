<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variant extends Model
{
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    //Handle Cache
    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('home_products');
        });

        static::deleted(function () {
            cache()->forget('home_products');
        });
    }


}
