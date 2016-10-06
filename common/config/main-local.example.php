<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=morodb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],

    ],
    'aliases' => [
        '@backendUrl' => 'http://backend',
        '@frontendUrl' => 'http://front',
        '@staticUrl' => '@frontendUrl/static',
        '@staticDir' => '@frontend/web/static',
    ],
];
