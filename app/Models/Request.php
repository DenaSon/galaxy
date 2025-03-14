<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);

    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function translateStatus($type = ''): string
    {
        return match ($type) {
            'pending' => ' بررسی',
            'approved' => 'تایید شده',
            'rejected' => 'لغو شده',


            default => 'نامشخص',
        };
    }
}
