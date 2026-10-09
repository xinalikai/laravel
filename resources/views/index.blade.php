@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<section>
    <h2>Все новости</h2>

    @if (session('success'))
        <div class="block" style="border-left-color:#27ae60; background:#eafaf1;">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($articles as $article)
        <div class="block">
            <h3>
                <a href="{{ route('article.show', $article->id) }}">
                    {{ $article->title }}
                </a>
            </h3>
            <p>{{ $article->content }}</p>
            <p class="meta">
                {{ $article->category->name }} |
                {{ $article->author }} |
                {{ $article->created_at->format('d.m.Y') }}
            </p>
        </div>
    @empty
        <p>Пока новостей нет.</p>
    @endforelse
</section>
@endsection