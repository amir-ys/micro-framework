<?php

use Core\Database\Connection;
use Core\Database\QueryBuilder;
use Core\Validator;

Validator::required('title');

\Core\App::resolve(QueryBuilder::class)->update('categories', $_GET['id'] , [
    'title' => $_POST['title'], 'description' => $_POST['description'], 'created_at' => date('Y-m-d H:i:s')]);

successFeedback('categories updated successfully');
redirect('/categories');