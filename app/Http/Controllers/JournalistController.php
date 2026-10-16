<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Text;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('journalist', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'heading'     => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'text'        => 'required|string',
        ]);

        $data['user_id'] = auth()->id();

        Text::create($data);

        return redirect()
            ->route('home')
            ->with('success', 'Статья опубликована');
    }
}