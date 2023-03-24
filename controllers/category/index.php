<?php

use Core\Database\Connection;
use Core\Database\QueryBuilder;

$categories = \Core\App::resolve(QueryBuilder::class)->all('categories');

require  view('categories/index.view.php' , [
    'header' => 'categories - index' ,
    'categories' => $categories ,
]);