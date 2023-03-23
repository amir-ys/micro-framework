<?php

$db = new Database();
authorize(method() != 'POST');
if (empty($_POST['title'])) {
    $_SESSION['errors'] = 'the title field is required';
    return redirect('/categories/create');
}

$category = $db->query('update categories set title = :title ,   description = :description , created_at = now() where id = :id', [
    ':title' => $_POST['title'], ':description' => $_POST['description'] , 'id' => $_GET['id']]);

successFeedback('categories updated successfully');
redirect('/categories');