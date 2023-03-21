<?php

$db = new Database();

require view('categories/create.view.php' , [
    'header' => 'categories - create' ,
]);