@extends('layouts.app')

@section('title', 'Новая категория')

@section('content')
<section>
    <h2>Новая категория</h2>

    @if ($errors->any())
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" class="editor-form">
        @csrf

        <div class="block">
            <label for="name">Название категории</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   placeholder="Например: Спорт" required>

            <button type="submit">Создать</button>

            <p style="margin-top:15px;">
                <a href="{{ route('categories') }}" class="back-link">← Назад к категориям</a>
            </p>
        </div>
    </form>
</section>
@endsection