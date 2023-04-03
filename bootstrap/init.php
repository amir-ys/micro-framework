<?php

session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/Helpers/helpers.php';

#autoloader
require base_path('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

(new \App\DI\Services())->register();

#todo load config in ether place

$GLOBALS["request"] = new \Core\Request();

require base_path('configs/error.php');

require base_path('routes/web.php');
(new \Core\Router\Router())->run();
