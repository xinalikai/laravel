@extends('layouts.app')

@section('title', 'Категории')

@section('content')
<section>
    <h2>Все категории</h2>

    @if (session('success'))
        <div class="block" style="border-left-color:#27ae60; background:#eafaf1;">
            {{ session('success') }}
        </div>
    @endif

    @auth
        <p style="margin-bottom: 20px;">
            <a href="{{ route('categories.create') }}" class="back-link">+ Добавить категорию</a>
        </p>
    @endauth

    @forelse ($categories as $category)
        <div class="block">
            <h3>
                <a href="{{ route('category', $category->id) }}">{{ $category->name }}</a>
            </h3>
            <p class="meta">Статей: {{ $category->texts_count }}</p>
        </div>
    @empty
        <p>Категорий пока нет.</p>
    @endforelse
</section>
@endsection