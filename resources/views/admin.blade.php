@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
<section>
    <h2>Управление статьями</h2>

    @if (session('success'))
        <div class="block" style="border-left-color:#27ae60; background:#eafaf1;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            {{ session('error') }}
        </div>
    @endif

    @forelse ($texts as $text)
        <div class="block">
            <h3>{{ $text->heading }}</h3>
            <p class="meta">
                Автор: {{ $text->author?->login ?? '—' }} |
                Категория: {{ $text->category->name }} |
                Статус:
                @if ($text->is_blocked)
                    <span style="color:#e74c3c;">заблокирована</span>
                @else
                    <span style="color:#27ae60;">активна</span>
                @endif
            </p>

            <a href="{{ route('admin.edit', $text->id) }}"
               class="btn-edit"
               style="text-decoration:none; display:inline-block;">Редактировать</a>

            <form action="{{ route('admin.block', $text->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button class="btn-block" type="submit">
                    {{ $text->is_blocked ? 'Разблокировать' : 'Блокировать' }}
                </button>
            </form>

            <form action="{{ route('admin.destroy', $text->id) }}" method="POST"
                  style="display:inline;"
                  onsubmit="return confirm('Удалить статью «{{ $text->heading }}»?');">
                @csrf
                @method('DELETE')
                <button class="btn-delete" type="submit">Удалить</button>
            </form>
        </div>
    @empty
        <p>Статей нет.</p>
    @endforelse
</section>

<section>
    <h2>Пользователи и роли</h2>

    @foreach ($users as $user)
        <div class="block">
            <h3>{{ $user->login }}</h3>
            <p class="meta">Текущая роль: {{ $user->role?->name ?? '—' }}</p>

            <form action="{{ route('admin.role', $user->id) }}" method="POST"
                  style="display:flex; gap:10px; align-items:center; margin-top:10px;">
                @csrf
                @method('PATCH')

                <select name="role_id" style="padding:6px 10px; border-radius:6px;">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-edit">Сменить роль</button>
            </form>
        </div>
    @endforeach
</section>
@endsection