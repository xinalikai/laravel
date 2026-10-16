<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Список всех категорий
    public function index()
    {
        $categories = Category::withCount('texts')->orderBy('name')->get();

        return view('categories', compact('categories'));
    }

    // Форма создания новой категории
    public function create()
    {
        return view('categories-create');
    }

    // Сохранение новой категории
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Введите название категории',
            'name.unique'   => 'Такая категория уже существует',
            'name.max'      => 'Название слишком длинное',
        ]);

        Category::create($data);

        return redirect()
            ->route('categories')
            ->with('success', 'Категория «' . $data['name'] . '» добавлена');
    }

    // Статьи одной категории
    public function show(int $id)
    {
        $category = Category::findOrFail($id);

        $texts = $category->texts()
            ->with('author')
            ->latest()
            ->paginate(5);

        return view('category', compact('category', 'texts'));
    }
}