<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Building extends Model
{
    public $guarded = [];

    public function members()
    {
        return $this->hasMany(Member::class);

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function elevators(): HasMany
    {
        return $this->hasMany(Elevator::class);
    }

    public function hasElevators(): bool
    {
        return $this->elevators()->count() > 0;

    }
}
