<?php

session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/helpers/helpers.php';

#autoloader
require base_path('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

(new \App\DI\Services())->register();

$GLOBALS["request"] = new \Core\Request();

print_r((new \Core\Router\Router())->run());
