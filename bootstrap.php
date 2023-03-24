<?php


use Core\App;

$container = new \Core\Container();
App::setContainer($container);

App::bind(\Core\Database::class, function () {
    $config =  require base_path('core/config/database.php');
    return new \Core\Database($config);
});
