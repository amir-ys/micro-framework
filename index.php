<?php
define('DISPLAY_ERROR', true);
define('BASE_PATH', __DIR__);

//display error
if (DISPLAY_ERROR) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);

}


require 'core/functions/helpers.php';

define('CURRENT_DOMAIN', currentDomain() . '/');


require 'core/route/router.php';



//config
define('DB_HOST' , 'localhost');
define('DB_NAME' , 'blog');
define('DB_USERNAME' , 'root');
define('DB_PASSWORD' , 'mysql');
