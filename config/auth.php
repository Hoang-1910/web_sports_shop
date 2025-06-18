<?php

return [

    'defaults' => [
        'guard' => 'web',   // User (customer) là mặc định
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [ // Customer/user thường
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [ // Admin, dùng cùng model, provider khác tên
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [ // Customer/user thường
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Dùng chung model User
        ],
        'admins' => [ // Admin
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Dùng chung model User
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
