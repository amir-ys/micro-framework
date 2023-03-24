<?php

use Core\Database\QueryBuilder;
use Core\Validator;

authorize(method() != 'POST');

Validator::required('title');
Validator::min('title', 2);

\Core\App::resolve(QueryBuilder::class)->create('categories', [
    'title' => $_POST['title'], 'description' => $_POST['description'], 'created_at' => date('Y-m-d H:i:s')]);

successFeedback('categories created successfully');
redirect('/categories');