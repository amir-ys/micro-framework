<?php

$db = new Database();
authorize(method() != 'POST');
if (empty($_POST['title'])) {
    newFeedback('the title field is required' , 'error');
    return redirect('/categories/create');
}

$category = $db->query('insert into categories(title , description , created_at) values(:title , :description , :now )', [
    ':title' => $_POST['title'], ':description' => $_POST['description'], ':now' => date('Y-m-d H:i:s') ]);

newFeedback('categories created successfully');
redirect('/categories');