<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =
    [
        '/' => 'controllers/index.php' ,
        '/about' => 'controllers/about.php' ,
        '/contact' => 'controllers/contact.php' ,
        '/categories' => 'controllers/category/index.php' ,
        '/categories' => 'controllers/category/show.php' ,
    ];
if (array_key_exists($uri , $routes)){
     require base_path($routes[$uri]);
}else{
    abort(404);
}

