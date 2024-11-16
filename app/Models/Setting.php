<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $guarded = [];
    public $timestamps = false;

    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('site_settings');
        });

        static::deleted(function () {
            cache()->forget('site_settings');
        });
    }



}
