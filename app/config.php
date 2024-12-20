<?php

namespace dwes\app;

use PDO;

return [
    'database' => [
        'name' => 'cursophp',
        'username' => 'usercurso',
        'password' => 'php',
        'connection' => 'mysql:host=dwes.local',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ],
    'mailer' => [
        'smtp_server' => 'smtp.gmail.com',
        'smtp_port' => '587',
        'smtp_security' => 'tls',
        'username' => 'pedrosalamora@gmail.com',
        'password' => 'mypassword',
        'email' => 'pedrosalamora@gmail.com',
        'name' => 'info'
    ],
    'logs' => [
        'filename' => 'curso.log',
        'level' => \Monolog\Logger::WARNING
    ],
    'routes' => [
        'filename' => 'routes.php'
    ],
    'project' => [
        'namespace' => 'dwes'
    ],
    'security' => [
        'roles' => [
            'ROLE_ADMIN' => 3,
            'ROLE_USER' => 2,
            'ROLE_ANONYMOUS' => 1
        ]
    ]

];
