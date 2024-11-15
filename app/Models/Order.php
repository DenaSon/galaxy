<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{



    public  function scopeActive($query)
    {
        return $query->where('status', '!=', 'cancelled');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
