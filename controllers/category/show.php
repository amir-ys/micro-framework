<?php

$db = new Database();

if ($_GET['id'] == 1){
    abort(403);
}

$category = $db->query('select * from categories where id = :id' ,  [':id' => $_GET['id']])->fetch();

require view('categories/show.view.php' , [
    'header' => 'categories - show' ,
    'category' => $category ,
]);