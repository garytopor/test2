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
        '@backendUrl' => 'http://garybackend/web',
        '@frontendUrl' => 'http://gary/frontend/web',
        '@staticUrl' => 'http://gary/frontend/static',
        '@staticDir' => '@frontend/static',
    ],
];
