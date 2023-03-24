<?php

use Core\Database\Connection;
use Core\Database\QueryBuilder;

$db = \Core\App::resolve(Connection::class);
authorize($_GET['id'] == 1);

$category = \Core\App::resolve(QueryBuilder::class)->findOrFail('categories' , $_GET['id']);

require view('categories/show.view.php' , [
    'header' => 'categories - show' ,
    'category' => $category ,
]);