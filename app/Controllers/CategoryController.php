<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Request;
use Core\Validator;

class CategoryController
{

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('categories/index', compact('categories'));
    }

    public function show()
    {
        $category = $this->category->findOrFail(request()->id);
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

        $this->category->create(
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
        $category = $this->category->findOrFail(request()->id);
        return view('categories/edit', compact('category'));
    }

    public function update(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        $this->category->update($request->id, [
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')]);

        successFeedback('categories updated successfully');
        redirect('/categories');
    }

    public function destroy()
    {
        $this->category->delete(request()->id);
        successFeedback('categories deleted successfully');
        redirect('/categories');
    }
}