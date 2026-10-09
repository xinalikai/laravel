@extends('layouts.app')

@section('title', $category->name)

@section('content')
<section>
    <h2>Категория: {{ $category->name }}</h2>

    @forelse ($articles as $article)
        <div class="block">
            <h3>
                <a href="{{ route('article.show', $article->id) }}">
                    {{ $article->title }}
                </a>
            </h3>
            <p>{{ $article->content }}</p>
            <p class="meta">
                {{ $article->author }} |
                {{ $article->created_at->format('d.m.Y') }}
            </p>
        </div>
    @empty
        <p>В этой категории пока нет статей.</p>
    @endforelse
</section>
@endsection