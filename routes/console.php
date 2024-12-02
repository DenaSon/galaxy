<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::command('app:generate-sitemap')->everyMinute()->withoutOverlapping();
Schedule::command('app:copy-sitemap')->everyMinute()->withoutOverlapping();
