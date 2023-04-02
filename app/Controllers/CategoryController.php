<?php

namespace App\Controllers;

use Core\App;
use Core\Database\QueryBuilder;
use Core\Validator;

class CategoryController
{
    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = App::resolve(QueryBuilder::class);
    }

    public function index()
    {
        $categories = $this->queryBuilder->all('categories');
        return view('categories/index', compact('categories'));
    }

    public function show()
    {
        $category = $this->queryBuilder->findOrFail('categories', $_GET['id']);
        return view('categories/show', compact('category'));
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        Validator::required('title');
        Validator::min('title', 2);

        $this->queryBuilder->create('categories',
            ['title' => $_POST['title'],
                'description' => $_POST['description'],
                'created_at' => date('Y-m-d H:i:s')]);

        successFeedback('categories created successfully');
        redirect('/categories');
    }

    public function edit()
    {
        $category = $this->queryBuilder->findOrFail('categories', $_GET['id']);
        return view('categories/edit', compact('category'));
    }

    public function update()
    {
        Validator::required('title');
        Validator::min('title', 2);

        $this->queryBuilder->update('categories', $_GET['id'], [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'created_at' => date('Y-m-d H:i:s')]);

        successFeedback('categories updated successfully');
        redirect('/categories');
    }

    public function destroy()
    {
        $this->queryBuilder->delete('categories', $_GET['id']);
        successFeedback('categories deleted successfully');
        redirect('/categories');
    }


}