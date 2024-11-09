<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute')->withPivot('value');

    }
}
