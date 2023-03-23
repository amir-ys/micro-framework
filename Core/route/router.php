<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =
    [
        '/' => 'controllers/index.php',
        '/about' => 'controllers/about.php',
        '/contact' => 'controllers/contact.php',
        '/categories' => 'controllers/category/index.php',
        '/categories/show' => 'controllers/category/show.php',
        '/categories/create' => 'controllers/category/create.php',
        '/categories/store' => 'controllers/category/store.php',
        '/categories/edit' => 'controllers/category/edit.php',
        '/categories/update' => 'controllers/category/update.php',
        '/categories/destroy' => 'controllers/category/destroy.php',
    ];
if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
} else {
    abort(Response::NOT_FOUND);
}

