<?php

use Core\Database;

$db = new Database();

$categories = $db->query('select * from categories')->get();

require  view('categories/index.view.php' , [
    'header' => 'categories - index' ,
    'categories' => $categories ,
]);