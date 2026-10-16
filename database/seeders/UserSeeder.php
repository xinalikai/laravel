<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::pluck('id', 'name');

        User::create([
            'login'    => 'admin',
            'password' => Hash::make('admin123'),
            'role_id'  => $roles['admin'],
        ]);

        User::create([
            'login'    => 'journalist',
            'password' => Hash::make('journalist123'),
            'role_id'  => $roles['journalist'],
        ]);

        User::create([
            'login'    => 'reader',
            'password' => Hash::make('reader123'),
            'role_id'  => $roles['reader'],
        ]);
    }
}