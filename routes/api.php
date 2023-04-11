<?php


use Core\Router\Route;

Route::get('/api/categories', [App\Controllers\Api\CategoryController::class, 'index']);
Route::get('/api/categories/show', [App\Controllers\Api\CategoryController::class, 'show']);
Route::post('/api/categories/store', [App\Controllers\Api\CategoryController::class, 'store']);
Route::patch('/api/categories/update', [App\Controllers\Api\CategoryController::class, 'update']);
Route::delete('/api/categories/destroy', [App\Controllers\Api\CategoryController::class, 'destroy']);

Route::get('/api/articles', [App\Controllers\Api\ArticleController::class, 'index']);
Route::get('/api/articles/show', [App\Controllers\Api\ArticleController::class, 'show']);
Route::post('/api/articles/store', [App\Controllers\Api\ArticleController::class, 'store']);
Route::patch('/api/articles/update', [App\Controllers\Api\ArticleController::class, 'update']);
Route::delete('/api/articles/destroy', [App\Controllers\Api\ArticleController::class, 'destroy']);
