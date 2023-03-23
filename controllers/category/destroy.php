<?php

use Core\Database;

$db = new Database();
authorize(method() != 'GET');

$category = $db->query('delete from categories where id = :id' ,  [':id' => $_GET['id']]);

successFeedback('categories deleted successfully');
redirect('/categories');