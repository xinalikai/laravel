@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
<section>
    <h2>Редактировать статью</h2>

    @if ($errors->any())
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update', $text->id) }}" method="POST" class="editor-form">
        @csrf
        @method('PUT')

        <div class="block">
            <label for="heading">Заголовок</label>
            <input type="text" id="heading" name="heading"
                   value="{{ old('heading', $text->heading) }}" required>

            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}"
                        @selected(old('category_id', $text->category_id) == $cat->id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <label for="text">Текст</label>
            <textarea id="text" name="text" rows="10" required>{{ old('text', $text->text) }}</textarea>

            <button type="submit">Сохранить</button>
            <a href="{{ route('admin') }}" class="back-link" style="margin-left:15px;">← Назад</a>
        </div>
    </form>
</section>
@endsection