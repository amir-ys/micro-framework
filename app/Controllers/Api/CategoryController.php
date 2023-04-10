<?php

namespace App\Controllers\Api;

use App\Models\Category;
use Core\Request;
use Core\Response;
use Core\Validator;

class CategoryController
{
    private Category $category;

    public function index()
    {
        return Response::success(data: Category::all());
    }

    public function show()
    {
        $category = Category::findOrFail(request()->id);
        return Response::success(data: $category);
    }

    public function store(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => now()
            ]
        );

        return Response::success(message: 'category created successfully', data: $category);
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

        return Response::success(message: 'category updated successfully');
    }

    public function destroy()
    {
        Category::delete(request()->id);
        return Response::success(message: 'category deleted successfully');
    }
}