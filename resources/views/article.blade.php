@extends('layouts.app')

@section('title', $article->title)

@section('content')
<section>
    <h2>{{ $article->title }}</h2>

    <p class="meta">
        {{ $article->category->name }} |
        {{ $article->author }} |
        {{ $article->created_at->format('d.m.Y') }}
    </p>

    <div class="block">
        {!! nl2br(e($article->content)) !!}
    </div>

    <p style="margin-top: 20px;">
        <a href="{{ route('home') }}" class="back-link">← Назад к новостям</a>
    </p>
</section>
@endsection