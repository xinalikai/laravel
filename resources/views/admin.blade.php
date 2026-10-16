@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
<section>
    <h2>Управление статьями</h2>

    <div class="block">
        <h3>Открытие нового телескопа</h3>
        <p class="meta">Автор: Иван Петров | Категория: Космос | Статус: активна</p>
        <button class="btn-edit" type="button">Редактировать</button>
        <button class="btn-block" type="button">Блокировать</button>
        <button class="btn-delete" type="button">Удалить</button>
    </div>

    <div class="block">
        <h3>Прорыв в медицине</h3>
        <p class="meta">Автор: Анна Смирнова | Категория: Медицина | Статус: активна</p>
        <button class="btn-edit" type="button">Редактировать</button>
        <button class="btn-block" type="button">Блокировать</button>
        <button class="btn-delete" type="button">Удалить</button>
    </div>

    <div class="block">
        <h3>Новый язык программирования</h3>
        <p class="meta">Автор: Сергей Иванов | Категория: IT | Статус: активна</p>
        <button class="btn-edit" type="button">Редактировать</button>
        <button class="btn-block" type="button">Блокировать</button>
        <button class="btn-delete" type="button">Удалить</button>
    </div>
</section>

<section>
    <h2>Роли пользователей</h2>

    <form class="editor-form" onsubmit="return false;">
        <div class="block">
            <label for="user">Пользователь</label>
            <select id="user" name="user">
                <option>Иван Петров</option>
                <option>Анна Смирнова</option>
                <option>Сергей Иванов</option>
            </select>

            <label for="role">Роль</label>
            <select id="role" name="role">
                <option value="reader">Читатель</option>
                <option value="journalist">Журналист</option>
                <option value="admin">Администратор</option>
            </select>

            <button type="submit">Изменить роль</button>
        </div>
    </form>
</section>
@endsection