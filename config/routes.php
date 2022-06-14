<?php

return [
    '/' => [
        'App\Controllers\HomeController',
        'show'
    ],

    '/register' => [
        'App\Controllers\RegisterController',
        'show'
    ],

    '/login' => [
        'App\Controllers\LoginController',
        'show'
    ],

    '/logout' => [
        'App\Controllers\LogoutController',
        'logout'
    ],

    '/profile' => [
        'App\Controllers\ProfileController',
        'show'
    ]
    
];