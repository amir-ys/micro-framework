<?php

use Core\Database\QueryBuilder;

$category = \Core\App::resolve(QueryBuilder::class)->delete('categories' , $_GET['id']);

successFeedback('categories deleted successfully');
redirect('/categories');