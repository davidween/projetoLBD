<?php

return [

    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    'Security' => [
        'salt' => env('SECURITY_SALT', '6fe121bc2c015a5460ad6f9c8d7800060b2b489b7ac2d5b3db9eb7063b629fbf'),
    ],

    'Datasources' => [
        'default' => [
            'host' => 'localhost',

            'username' => 'local',
            'password' => 'HaltAndCatchF1re',
            'database' => 'livraria',
   
            'url' => env('DATABASE_URL', null),
        ],

        'test' => [
            'host' => 'localhost',
            'username' => 'local',
            'password' => 'HaltAndCatchF1re',
            'database' => 'livraria',
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tests.sqlite'),
        ],
    ],

    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
