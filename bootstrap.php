<?php


use Core\App;

$container = new \Core\Container();
App::setContainer($container);


App::bind(\Core\Database::class, function () {
    return new \Core\Database();
});
