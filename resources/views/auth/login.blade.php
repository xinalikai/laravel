@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<section>
    <h2>Вход</h2>

    @if ($errors->any())
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="editor-form">
        @csrf

        <div class="block">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login"
                   value="{{ old('login') }}" required>

            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>

            <label style="display:flex; align-items:center; gap:8px; margin-top:12px;">
                <input type="checkbox" name="remember" value="1">
                Запомнить меня
            </label>

            <button type="submit">Войти</button>

            <p style="margin-top:15px;">
                Нет аккаунта?
                <a href="{{ route('register') }}" class="back-link">Зарегистрироваться</a>
            </p>
        </div>
    </form>
</section>
@endsection