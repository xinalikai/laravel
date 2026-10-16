<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Text;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Главная страница админки
    public function index()
    {
        $texts = Text::with(['category', 'author'])->latest()->get();
        $users = User::with('role')->orderBy('login')->get();
        $roles = Role::orderBy('id')->get();

        return view('admin', compact('texts', 'users', 'roles'));
    }

    // Блокировка / разблокировка статьи
    public function block(int $id)
    {
        $text = Text::findOrFail($id);
        $text->is_blocked = ! $text->is_blocked;
        $text->save();

        $status = $text->is_blocked ? 'заблокирована' : 'разблокирована';

        return redirect()->route('admin')->with('success', "Статья «{$text->heading}» {$status}");
    }

    // Удаление статьи
    public function destroy(int $id)
    {
        $text = Text::findOrFail($id);
        $text->delete();

        return redirect()->route('admin')->with('success', 'Статья удалена');
    }

    // Форма редактирования
    public function edit(int $id)
    {
        $text = Text::findOrFail($id);
        $categories = \App\Models\Category::orderBy('name')->get();

        return view('admin-edit', compact('text', 'categories'));
    }

    // Сохранение правок
    public function update(Request $request, int $id)
    {
        $text = Text::findOrFail($id);

        $data = $request->validate([
            'heading'     => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'text'        => 'required|string',
        ]);

        $text->update($data);

        return redirect()->route('admin')->with('success', 'Статья обновлена');
    }

    // Смена роли пользователя
    public function changeRole(Request $request, int $id)
    {
        $data = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);

        // защита: не даём админу понизить себя
        if ($user->id === auth()->id() && $user->role_id != $data['role_id']) {
            return back()->with('error', 'Нельзя изменить свою роль');
        }

        $user->update(['role_id' => $data['role_id']]);

        return redirect()->route('admin')->with('success', 'Роль пользователя изменена');
    }
}