<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Request;
use Core\Validator;

class CategoryController
{

    private Category $category;

    public function index()
    {
        $categories = Category::all();
        return view('categories/index', compact('categories'));
    }

    public function show()
    {
        $category = Category::findOrFail(request()->id);
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

        Category::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => now()

            ]);

        successFeedback('categories created successfully');
        redirect('/categories');
    }

    public function edit()
    {
        $category = Category::findOrFail(request()->id);
        return view('categories/edit', compact('category'));
    }

    public function update(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        Category::update($request->id, [
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now()
        ]);

        successFeedback('categories updated successfully');
        redirect('/categories');
    }

    public function destroy()
    {
        Category::delete(request()->id);
        successFeedback('categories deleted successfully');
        redirect('/categories');
    }
}