<?php

namespace App\DI;

use Core\App;

class Services
{
    public function register()
    {
        $this->init();
        $this->registerConfigs();
        $this->registerDatabaseDriver();
    }

    private function registerConfigs()
    {
        App::bind('config.app', require base_path("configs/app.php"));
        App::bind('config.database', require base_path("configs/database.php"));
        App::bind('config.error', require base_path("configs/error.php"));
    }

    private function registerDatabaseDriver()
    {
        App::bind(\Core\Database\QueryBuilder::class, function () {
            $config = App::resolve('config.database');
            $connection = \Core\Database\Connection::getInstance($config)->getConnect();
            return new \Core\Database\QueryBuilder($connection);
        });
    }

    private function init()
    {
        $container = new \Core\Container();
        App::setContainer($container);
    }

}