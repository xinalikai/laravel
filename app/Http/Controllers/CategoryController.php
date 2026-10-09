<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Список всех категорий
    public function index()
    {
        $categories = Category::withCount('articles')->orderBy('name')->get();

        return view('categories', compact('categories'));
    }

    // Статьи одной категории
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = $category->articles()
            ->where('is_blocked', false)
            ->latest()
            ->get();

        return view('category', compact('category', 'articles'));
    }

    // Создание новой категории из формы журналиста
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Введите название категории',
            'name.unique'   => 'Такая категория уже существует',
        ]);

        $data['slug'] = Str::slug($data['name']);

        // Если slug вдруг совпал с существующим — добавим суффикс
        $base = $data['slug'];
        $i = 1;
        while (Category::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $base . '-' . $i++;
        }

        Category::create($data);

        return redirect()
            ->route('journalist')
            ->with('success', 'Категория «' . $data['name'] . '» добавлена');
    }
}