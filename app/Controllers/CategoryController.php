<?php

namespace App\Controllers;

use Core\App;
use Core\Database\QueryBuilder;
use Core\Request;
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
        $category = $this->queryBuilder->findOrFail('categories', request()->id);
        return view('categories/show', compact('category'));
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        $this->queryBuilder->create('categories',
            [
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => date('Y-m-d H:i:s')
            ]);

        successFeedback('categories created successfully');
        redirect('/categories');
    }

    public function edit()
    {
        $category = $this->queryBuilder->findOrFail('categories', request()->id);
        return view('categories/edit', compact('category'));
    }

    public function update(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        $this->queryBuilder->update('categories', $request->id, [
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')]);

        successFeedback('categories updated successfully');
        redirect('/categories');
    }

    public function destroy()
    {
        $this->queryBuilder->delete('categories' , request()->id);
        successFeedback('categories deleted successfully');
        redirect('/categories');
    }


}