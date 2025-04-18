<?php

namespace Denason\IranLocation\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    protected $fillable = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

