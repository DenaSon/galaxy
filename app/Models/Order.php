<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{




    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'total_price',
        'payment_status',
        'payment_method',
        'shipping_address',
        'shipping_tracking',
        'order_number',
        'shipping_method',
        'shipping_cost',
        'tax',
        'discount_amount',
        'subtotal',
        'payment_transaction_id',
        'grand_total',
        'currency',
        'payment_due_date',
        'weight'
    ];



    public  function scopeActive($query)
    {
        return $query->where('status', '!=', 'cancelled')->where('payment_status', '=', 'paid');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
