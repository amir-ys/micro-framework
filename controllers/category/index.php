<?php

use Core\Database;

$db = \Core\App::resolve(Database::class);

$categories = $db->query('select * from categories')->get();

require  view('categories/index.view.php' , [
    'header' => 'categories - index' ,
    'categories' => $categories ,
]);