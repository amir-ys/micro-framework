<?php

use Core\Database;

$db = \Core\App::resolve(Database::class);
authorize($_GET['id'] == 1);

$category = $db->query('select * from categories where id = :id' ,  [':id' => $_GET['id']])->findOrFail();

require view('categories/show.view.php' , [
    'header' => 'categories - show' ,
    'category' => $category ,
]);