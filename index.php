<?php
session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__;

require BASE_PATH . '/core/helpers/helper.php';

require base_path('core/autoloader.php');
require base_path('core/config/error.php');
require base_path('routes.php');
require base_path('bootstrap.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->router($uri, $method);