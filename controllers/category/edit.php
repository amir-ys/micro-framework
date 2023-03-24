<?php


use Core\Database\QueryBuilder;

authorize(!isset($_GET['id']));

$category = \Core\App::resolve(QueryBuilder::class)->findOrFail('categories' , $_GET['id']);

require view('categories/edit.view.php' , [
    'header' => 'categories - create' ,
    'category' => $category ,
]);