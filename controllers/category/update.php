<?php

use Core\Database;
use Core\Validator;

$db = \Core\App::resolve(Database::class);
authorize(method() != 'POST');
Validator::required('title');


$category = $db->query('update categories set title = :title ,   description = :description , created_at = now() where id = :id', [
    ':title' => $_POST['title'], ':description' => $_POST['description'] , 'id' => $_GET['id']]);

successFeedback('categories updated successfully');
redirect('/categories');