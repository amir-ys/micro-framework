<?php

$router = new Core\Router();


$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/contact', 'HomeController@contact');

$router->get('/categories', [Controllers\CategoryController::class, 'index']);
$router->get('/categories/show', [Controllers\CategoryController::class, 'show']);
$router->get('/categories/create', [Controllers\CategoryController::class, 'create']);
$router->post('/categories/store', [Controllers\CategoryController::class, 'store']);
$router->get('/categories/edit', [Controllers\CategoryController::class, 'edit']);
$router->patch('/categories/update', [Controllers\CategoryController::class, 'update']);
$router->delete('/categories/destroy', [Controllers\CategoryController::class, 'destroy']);
