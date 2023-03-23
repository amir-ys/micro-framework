<?php

$router = new Core\Router();


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/categories', 'controllers/category/index.php');
$router->get('/categories/show', 'controllers/category/show.php');
$router->get('/categories/create', 'controllers/category/create.php');
$router->post('/categories/store', 'controllers/category/store.php');
$router->get('/categories/edit', 'controllers/category/edit.php');
$router->patch('/categories/update', 'controllers/category/update.php');
$router->delete('/categories/destroy', 'controllers/category/destroy.php');
