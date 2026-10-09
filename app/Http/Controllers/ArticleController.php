<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('journalist', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required|string',
            'author'      => 'nullable|string|max:255',
        ]);

        $data['author'] = $data['author'] ?? 'Редакция';

        Article::create($data);

        return redirect()
            ->route('home')
            ->with('success', 'Статья опубликована');
    }

    public function show(int $id)
    {
        $article = Article::with('category')->findOrFail($id);

        return view('article', compact('article'));
    }
}