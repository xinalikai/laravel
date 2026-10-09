<?php

namespace App\Http\Controllers;

use App\Models\Article;

class AdminController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->latest()->get();

        return view('admin', compact('articles'));
    }
}