<?php

namespace App\Http\Controllers;

use App\Models\Text;

class ArticleController extends Controller
{
    public function show(int $id)
    {
        $text = Text::with(['category', 'author'])->findOrFail($id);

        return view('article', compact('text'));
    }
}