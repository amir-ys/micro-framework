<?php

session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/Helpers/helpers.php';


spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}" . ".php");
});


(new \App\DI\Services())->register();


require base_path('configs/error.php');
require base_path('routes/web.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->router($uri, $method);