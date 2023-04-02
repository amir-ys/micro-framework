<?php


use Core\Router\Route;


Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Route::get('/categories', [App\Controllers\CategoryController::class, 'index']);
Route::get('/categories/show', [App\Controllers\CategoryController::class, 'show']);
Route::post('/categories/create', [App\Controllers\CategoryController::class, 'create']);
Route::post('/categories/store', [App\Controllers\CategoryController::class, 'store']);
Route::get('/categories/edit', [App\Controllers\CategoryController::class, 'edit']);
Route::patch('/categories/update', [App\Controllers\CategoryController::class, 'update']);
Route::delete('/categories/destroy', [App\Controllers\CategoryController::class, 'destroy']);
