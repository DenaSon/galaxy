<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }


    public function Buildings()
    {
        return $this->hasMany(Building::class);

    }


    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
