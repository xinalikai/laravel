@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
<section>
    <h2>Управление статьями</h2>

    @forelse ($articles as $article)
        <div class="block">
            <h3>{{ $article->title }}</h3>
            <p class="meta">
                Автор: {{ $article->author }} |
                Категория: {{ $article->category->name }} |
                Статус: {{ $article->is_blocked ? 'заблокирована' : 'активна' }}
            </p>
            <button class="btn-edit" type="button">Редактировать</button>
            <button class="btn-block" type="button">Блокировать</button>
            <button class="btn-delete" type="button">Удалить</button>
        </div>
    @empty
        <p>Статей нет.</p>
    @endforelse
</section>

<section>
    <h2>Роли пользователей</h2>

    <form class="editor-form" onsubmit="return false;">
        <div class="block">
            <label for="user">Пользователь</label>
            <select id="user" name="user">
                <option>Иван Петров</option>
                <option>Анна Смирнова</option>
                <option>Сергей Иванов</option>
            </select>

            <label for="role">Роль</label>
            <select id="role" name="role">
                <option value="reader">Читатель</option>
                <option value="journalist">Журналист</option>
                <option value="admin">Администратор</option>
            </select>

            <button type="submit">Изменить роль</button>
        </div>
    </form>
</section>
@endsection