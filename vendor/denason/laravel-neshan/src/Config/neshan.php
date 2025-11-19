<?php


/*
|--------------------------------------------------------------------------
|  Services Configuration
|--------------------------------------------------------------------------
|
|
*/
return [

    'base_url' => env('NESHAN_API_BASE_URL', 'https://api.neshan.org'),

    'map' => [
        'api_key' => env('NESHAN_MAP_API_KEY', ''),
    ],

    'service' => [
        'api_key' => env('NESHAN_SERVICE_API_KEY', ''),
    ],
];
