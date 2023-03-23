<?php

use Core\Database;

$db = \Core\App::resolve(Database::class);
authorize(method() != 'GET');

$category = $db->query('delete from categories where id = :id' ,  [':id' => $_GET['id']]);

successFeedback('categories deleted successfully');
redirect('/categories');