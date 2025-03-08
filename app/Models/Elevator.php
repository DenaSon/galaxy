<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elevator extends Model
{
    public $guarded = [];

    public function building()
    {
        return $this->belongsTo(Building::class);

    }


}
