<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::command('app:generate-sitemap')->everyTwoHours()->withoutOverlapping();
Schedule::command('app:copy-sitemap')->everyFourHours()->withoutOverlapping();
Schedule::command('app:system-clear')->everyThreeMinutes()->withoutOverlapping();


