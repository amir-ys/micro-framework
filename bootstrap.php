<?php

use Core\App;

$container = new \Core\Container();
App::setContainer($container);

App::bind(\Core\Database\Connection::class, function () {
    $config = require base_path('core/config/database.php');
    return Core\Database\Connection::getInstance($config)->getConnect();
});

App::bind(\Core\Database\Connection::class, function () {
    $config = require base_path('core/config/database.php');
    return Core\Database\Connection::getInstance($config)->getConnect();
});
