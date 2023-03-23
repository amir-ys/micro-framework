<?php
session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__;

require 'core/helpers/helper.php';

spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}" . ".php");
});

require base_path('core/config/error.php');
require base_path('core/route/router.php');
