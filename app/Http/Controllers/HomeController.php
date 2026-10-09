<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->where('is_blocked', false)
            ->latest()
            ->get();

        return view('index', compact('articles'));
    }
}