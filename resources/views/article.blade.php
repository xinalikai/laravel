@extends('layouts.app')

@section('title', $text->heading)

@section('content')
<section>
    <h2>{{ $text->heading }}</h2>

    <p class="meta">
        {{ $text->category->name }} |
        {{ $text->author?->login ?? 'Редакция' }} |
        {{ $text->created_at->format('d.m.Y') }}
    </p>

    <div class="block">
        {!! nl2br(e($text->text)) !!}
    </div>

    <p style="margin-top: 20px;">
        <a href="{{ route('home') }}" class="back-link">← Назад</a>
    </p>
</section>
@endsection