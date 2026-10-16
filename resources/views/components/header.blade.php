<header>
    <a href="{{ route('home') }}">Главная</a>
    <a href="{{ route('categories') }}">Категории</a>

    @auth
        @if (auth()->user()->isJournalist())
            <a href="{{ route('journalist') }}">Журналист</a>
        @endif

        @if (auth()->user()->isAdmin())
            <a href="{{ route('admin') }}">Админ</a>
        @endif

        <span style="color:#ecf0f1; padding: 5px 15px;">
            {{ auth()->user()->login }}
            @if (auth()->user()->role)
                <small style="opacity:.7;">({{ auth()->user()->role->name }})</small>
            @endif
        </span>

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit"
                    style="background:none; border:none; color:#ecf0f1; font-weight:bold; cursor:pointer; padding:5px 15px;">
                Выход
            </button>
        </form>
    @else
        <a href="{{ route('login') }}">Вход</a>
        <a href="{{ route('register') }}">Регистрация</a>
    @endauth
</header>