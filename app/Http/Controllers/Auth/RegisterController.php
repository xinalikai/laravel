<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'login'    => ['required', 'string', 'max:255', 'unique:users,login', 'min:3'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ], [
        'login.required'    => 'Введите логин',
        'login.unique'      => 'Такой логин уже занят',
        'login.min'         => 'Логин должен быть не короче 3 символов',
        'password.required' => 'Введите пароль',
        'password.min'      => 'Пароль должен быть не короче 6 символов',
        'password.confirmed'=> 'Пароли не совпадают',
    ]);

    // Находим роль reader
    $readerRole = \App\Models\Role::where('name', 'reader')->first();

    $user = User::create([
        'login'    => $data['login'],
        'password' => Hash::make($data['password']),
        'role_id'  => $readerRole?->id,   // <- присваиваем роль
    ]);

    Auth::login($user);

    return redirect()->route('home')->with('success', 'Вы зарегистрированы');
}
}