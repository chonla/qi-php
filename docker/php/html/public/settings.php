<?php

return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'mysql',
            'database' => 'qidb',
            'username' => 'qi',
            'password' => 'qi1234',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'pagination' => [
            'size' => 10,
        ],
        'jwt' => [
            'age' => '1 day',
        ]
    ],
];