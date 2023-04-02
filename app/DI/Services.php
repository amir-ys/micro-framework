<?php

namespace App\DI;

use Core\App;

class Services
{
    public function register()
    {
        $container = new \Core\Container();
        App::setContainer($container);

        App::bind('config.app', require base_path("configs/app.php"));

        App::bind(\Core\Database\QueryBuilder::class, function () {
            $config = require base_path('configs/database.php');
            $connection = \Core\Database\Connection::getInstance($config)->getConnect();
            return new \Core\Database\QueryBuilder($connection);
        });

    }

}