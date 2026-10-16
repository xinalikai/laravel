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

    @forelse ($texts as $text)
        <div class="block">
            <h3>
                <a href="{{ route('article.show', $text->id) }}">
                    {{ $text->heading }}
                </a>
            </h3>
            <p>{{ \Illuminate\Support\Str::limit($text->text, 200) }}</p>
            <p class="meta">
                {{ $text->category->name }} |
                {{ $text->author?->login ?? 'Редакция' }} |
                {{ $text->created_at->format('d.m.Y') }}
            </p>
        </div>
    @empty
        <p>Пока новостей нет.</p>
    @endforelse

    <div style="margin-top: 20px;">
        {{ $texts->links('vendor.pagination.simple') }}
    </div>
</section>
@endsection