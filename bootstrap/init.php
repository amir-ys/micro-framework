<?php

session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/Helpers/helpers.php';

//autoloader
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}" . ".php");
});

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

(new \App\DI\Services())->register();

#todo load config in ether place
require base_path('configs/error.php');

require base_path('routes/web.php');
(new \Core\Router\Router())->run();
