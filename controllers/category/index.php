<?php

$db = new Database();

$categories = $db->query('select * from categories')->get();

require  view('categories/index.view.php' , [
    'header' => 'categories - index' ,
    'categories' => $categories ,
]);