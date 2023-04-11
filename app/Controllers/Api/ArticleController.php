<?php

namespace App\Controllers\Api;

use App\Enums\ArticleEnums;
use App\Models\Article;
use Core\Request;
use Core\Response;
use Core\Validator;

class ArticleController
{
    private Article $article;

    public function index()
    {
        return Response::success(data: Article::all());
    }

    public function show()
    {
        $article = Article::findOrFail(request()->id);
        return Response::success(data: $article);
    }

    public function store(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        $article = Article::create([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'body' => $request->body,
                'status' => ArticleEnums::PUBLISHED->value,
                'created_at' => now(),
            ]
        );

        return Response::success(message: 'article created successfully', data: $article);
    }

    public function update(Request $request)
    {
        Validator::required('title');
        Validator::min('title', 2);

        Article::update($request->id, [
            'title' => $request->title,
            'author_id' => $request->author_id,
            'body' => $request->body,
            'status' => ArticleEnums::PUBLISHED->value,
            'created_at' => now(),
        ]);

        return Response::success(message: 'article updated successfully');
    }

    public function destroy()
    {
        Article::delete(request()->id);
        return Response::success(message: 'article deleted successfully');
    }
}