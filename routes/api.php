<?php


use Core\Router\Route;

Route::get('/api/categories', [App\Controllers\Api\CategoryController::class, 'index']);
Route::get('/api/categories/show', [App\Controllers\Api\CategoryController::class, 'show']);
Route::post('/api/categories/store', [App\Controllers\Api\CategoryController::class, 'store']);
Route::patch('/api/categories/update', [App\Controllers\Api\CategoryController::class, 'update']);
Route::delete('/api/categories/destroy', [App\Controllers\Api\CategoryController::class, 'destroy']);
