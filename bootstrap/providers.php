<?php

use Denason\PersianSlug\SlugGeneratorInterface;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\DatabaseServiceProvider::class,
    App\Providers\GateServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    SlugGeneratorInterface::class,
];
