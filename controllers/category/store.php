<?php

$db = new Database();
authorize(method() != 'POST');

Validator::required('title');
Validator::min('title' , 2);

$category = $db->query('insert into categories(title , description , created_at) values(:title , :description , :now )', [
    ':title' => $_POST['title'], ':description' => $_POST['description'], ':now' => date('Y-m-d H:i:s') ]);

successFeedback('categories created successfully');
redirect('/categories');