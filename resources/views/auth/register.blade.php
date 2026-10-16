@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<section>
    <h2>Регистрация</h2>

    @if ($errors->any())
        <div class="block" style="border-left-color:#e74c3c; background:#fdecea;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="editor-form">
        @csrf

        <div class="block">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login"
                   value="{{ old('login') }}" required>

            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Зарегистрироваться</button>

            <p style="margin-top:15px;">
                Уже есть аккаунт?
                <a href="{{ route('login') }}" class="back-link">Войти</a>
            </p>
        </div>
    </form>
</section>
@endsection