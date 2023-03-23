<?php

use Core\Database;

$db = new Database();
authorize(!isset($_GET['id']));

$category = $db->query('select * from categories  where id = :id ' , [':id' => $_GET['id']])->findOrFail();

require view('categories/edit.view.php' , [
    'header' => 'categories - create' ,
    'category' => $category ,
]);