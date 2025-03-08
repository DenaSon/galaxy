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

    public function translateType($type = ''): string
    {
        return match ($type) {
            'passenger' => 'مسافربر',
            'freight' => 'باری',
            'service' => 'خدماتی',
            'hospital' => 'بیمارستانی',
            'panoramic' => 'پانوراما (شیشه‌ای)',
            'dumbwaiter' => 'غذابر',
            'home' => 'خانگی',
            'vehicle' => 'خودروبر',
            'other' => 'سایر',
            default => 'نامشخص',
        };
    }

    public function translateStatus($status): string
    {
        return match ($status) {
            'active' => 'فعال',
            'inactive' => 'غیرفعال',
            default => 'نامشخص',
        };

    }


}
