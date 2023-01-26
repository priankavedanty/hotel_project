<?php

// require '../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
// $dotenv->load();


return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // setting database toko
        'db_hotel' => [
            'host' => '127.0.0.1',
            'user' => 'root',
            'pass' => '',
            'dbname' => 'db_hotel2',
            'driver' => 'mysql'
        ],

        'jwt' => [
            'secret' => 'eTQpBBEgpLCZ5tSaYKcc3YgENnwcVxe3eReegJ45PgGhpmXWz9HagTqaxDZMuHyT'
        ]
    ],
];
