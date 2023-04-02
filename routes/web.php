<?php

$router = new Core\Router();


$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/contact', 'HomeController@contact');

$router->get('/categories', [App\Controllers\CategoryController::class, 'index']);
$router->get('/categories/show', [App\Controllers\CategoryController::class, 'show']);
$router->get('/categories/create', [App\Controllers\CategoryController::class, 'create']);
$router->post('/categories/store', [App\Controllers\CategoryController::class, 'store']);
$router->get('/categories/edit', [App\Controllers\CategoryController::class, 'edit']);
$router->patch('/categories/update', [App\Controllers\CategoryController::class, 'update']);
$router->delete('/categories/destroy', [App\Controllers\CategoryController::class, 'destroy']);
