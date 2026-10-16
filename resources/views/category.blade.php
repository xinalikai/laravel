@extends('layouts.app')

@section('title', $category->name)

@section('content')
<section>
    <h2>Категория: {{ $category->name }}</h2>

    @forelse ($texts as $text)
        <div class="block">
            <h3>
                <a href="{{ route('article.show', $text->id) }}">{{ $text->heading }}</a>
            </h3>
            <p>{{ \Illuminate\Support\Str::limit($text->text, 200) }}</p>
            <p class="meta">
                {{ $text->author?->login ?? 'Редакция' }} |
                {{ $text->created_at->format('d.m.Y') }}
            </p>
        </div>
    @empty
        <p>В этой категории пока нет статей.</p>
    @endforelse

    <div style="margin-top: 20px;">
        {{ $texts->links('vendor.pagination.simple') }}
    </div>

    <p style="margin-top: 20px;">
        <a href="{{ route('categories') }}" class="back-link">← Все категории</a>
    </p>
</section>
@endsection