<?php

$router = new Core\Router();


$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/contact', 'HomeController@contact');

$router->get('/categories', 'CategoryController@index');
$router->get('/categories/show', 'CategoryController@show');
$router->get('/categories/create', 'CategoryController@create');
$router->post('/categories/store', 'CategoryController@store');
$router->get('/categories/edit', 'CategoryController@edit');
$router->patch('/categories/update', 'CategoryController@update');
$router->delete('/categories/destroy', 'CategoryController@destroy');
