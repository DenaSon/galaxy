<?php

return
    [
        'wp_enable' => true,


        'corcel_database_connection' => env('WP_CORCEL_CONNECTION_NAME', 'wordpress'),

        //Database Info
        'wp_db_host' => env('WP_DB_HOST', 'localhost'),
        'wp_db_user' => env('WP_DB_USERNAME', 'root'),
        'wp_db_password' => env('WP_DB_PASSWORD', ''),
        'wp_db_name' => env('WP_DB_NAME', 'blog'),
        'wp_db_prefix' => env('WP_DB_PREFIX', ''),
        'wp_db_charset' => env('WP_DB_CHARSET', 'utf8'),


    ];
