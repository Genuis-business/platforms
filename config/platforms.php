<?php

return [
    'tiktok' => [
        'app_id' => env('TIKTOK_APP_ID'),
        'secret' => env('TIKTOK_SECRET'),
        'redirect_url' => env('TIKTOK_REDIRECT_URL'),
    ],
    'snapchat' => [
        'client_id' => env('SNAPCHAT_APP_ID'),
        'client_secret' => env('SNAPCHAT_SECRET'),
        'redirect_url' => env('SNAPCHAT_REDIRECT_URL'),
    ],
    'salla' => [
        'client_id' => env('SALLA_APP_ID'),
        'client_secret' => env('SALLA_CLIENT_SECRET'),
        'redirect_url' => env('SALLA_REDIRECT_URL'),
        'webhook_secret' => env('SALLA_WEBHOOK_SECRET'),
    ],
    'meta' => [
        'client_id' => env('META_APP_ID'),
        'client_secret' => env('META_CLIENT_SECRET'),
        'redirect_url' => env('META_REDIRECT_URL'),
    ],
    'x' => [
        'client_id' => env('X_CLIENT_ID'),
        'client_secret' => env('X_CLIENT_SECRET'),
        'api_key' => env('X_API_KEY'),
        'redirect_url' => env('X_REDIRECT_URL'),
    ],
];
