@extends('layouts.app')

@section('title', 'Кабинет журналиста')

@section('content')
<section>
    <h2>Написать статью</h2>

    @if (session('success'))
        <div class="block" style="border-left-color:#27ae60; background:#eafaf1;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" class="editor-form">
        @csrf

        <div class="block">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title"
                   value="{{ old('title') }}"
                   placeholder="Введите заголовок" required>

            <label for="author">Автор</label>
            <input type="text" id="author" name="author"
                   value="{{ old('author') }}"
                   placeholder="Ваше имя (необязательно)">

            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id" required>
                <option value="">— выберите —</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <label for="content">Текст статьи</label>
            <textarea id="content" name="content" rows="10"
                      placeholder="Начните писать..." required>{{ old('content') }}</textarea>

            <button type="submit">Опубликовать</button>
        </div>
    </form>
</section>

<section>
    <h2>Добавить свою категорию</h2>

    <form action="{{ route('categories.store') }}" method="POST" class="editor-form">
        @csrf

        <div class="block">
            <label for="name">Название категории</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   placeholder="Например: Спорт" required>

            <button type="submit">Создать категорию</button>
        </div>
    </form>
</section>
@endsection