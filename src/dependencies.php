<?php

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

$container = $app->getContainer();

// подключаем базу данных
$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $capsule = new Capsule;
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => $settings['host'],
        'database' => $settings['dbname'],
        'username' => $settings['user'],
        'password' => $settings['pass'],
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};
