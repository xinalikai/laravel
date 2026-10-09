@extends('layouts.app')

@section('title', 'Категории')

@section('content')
<section>
    <h2>Все категории</h2>

    @forelse ($categories as $category)
        <div class="block">
            <h3>
                <a href="{{ route('category', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </h3>
            <p class="meta">
                Статей: {{ $category->articles_count }}
            </p>
        </div>
    @empty
        <p>Категорий пока нет.</p>
    @endforelse
</section>
@endsection