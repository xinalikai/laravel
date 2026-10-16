@extends('layouts.app')

@section('title', 'Кабинет журналиста')

@section('content')
<section>
    <h2>Написать статью</h2>

    @if ($errors->any())
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('journalist.store') }}" method="POST" class="editor-form">
        @csrf

        <div class="block">
            <label for="heading">Заголовок</label>
            <input type="text" id="heading" name="heading"
                   value="{{ old('heading') }}" required>

            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id" required>
                <option value="">— выберите —</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <label for="text">Текст статьи</label>
            <textarea id="text" name="text" rows="10" required>{{ old('text') }}</textarea>

            <button type="submit">Опубликовать</button>

            <p style="margin-top:15px;">
                Нет нужной категории?
                <a href="{{ route('categories.create') }}" class="back-link">Создать категорию</a>
            </p>
        </div>
    </form>
</section>
@endsection